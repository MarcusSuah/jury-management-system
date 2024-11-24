@extends('panel.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="container py-2 z-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card mx-auto col-8">
                            <div class="card-body">
                                <div id="quiz-container">
                                    <form id="quiz-form" class="row g-3">
                                        {{ csrf_field() }}
                                        <div id="timer" class="text-end text-danger fw-bold mb-3"></div>
                                        <div id="question-count" class="text-start fw-bold mb-2"></div>
                                        <div id="question-container" class="col-md-12">
                                            <!-- Question and answers will be dynamically injected here -->
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="button" id="next-button" class="btn btn-primary" disabled>
                                                Next
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
    let timer;
    // 10 minutes in milliseconds
    const quizDuration = 10 * 60 * 1000; 
    let timeRemaining = quizDuration;
    let currentQuestionIndex = 0;
    let questions = [];
    let score = 0;
    let assignmentID = 0;
    const results = { status: '', score: 0, assignmentID: assignmentID };
    let biasedCount = 0;

    function startTimer() {
        timer = setInterval(function () {
            timeRemaining -= 1000;
            const minutes = Math.floor(timeRemaining / (60 * 1000));
            const seconds = Math.floor((timeRemaining % (60 * 1000)) / 1000);
            $('#timer').text(`Time Left: ${minutes}m ${seconds}s`);

            if (timeRemaining <= 0) {
                clearInterval(timer);
                submitResult('fail', 'Time Up');
            }
        }, 1000);
    }

    function updateQuestionCount() {
        $('#question-count').text(`Question ${currentQuestionIndex + 1} of ${questions.length}`);
    }

    function loadQuestion(index) {
        const question = questions[index];
        const $questionContainer = $('#question-container');

        if (question) {
            let answersHtml = `
                <h4>${question.question}</h4>
                <div>
                    <label>
                        <input type="radio" name="answer" value="true"> ${question.answers.true}
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="answer" value="biased"> ${question.answers.biased}
                    </label>
                </div>
            `;

            question.answers.wrong.forEach((wrongAnswer, i) => {
                answersHtml += `
                    <div>
                        <label>
                            <input type="radio" name="answer" value="wrong-${i}"> ${wrongAnswer}
                        </label>
                    </div>
                `;
            });

            $questionContainer.html(answersHtml);

            // Enable "Next" button when an answer is selected
            $('input[name="answer"]').on('change', function () {
                $('#next-button').prop('disabled', false);
            });

            // Update the question count
            updateQuestionCount();
        } else {
            submitResult('completed', 'Quiz Completed');
        }
    }

    function submitResult(quizResult, message) {
        clearInterval(timer);
        if(quizResult === 'completed'){
            if(score > 6){
                results.status = 'pass';
            }else{
                results.status = 'fail';
            }
        }else{
            results.status = quizResult;
        }
        
        results.score = score;
        results.assignmentID = assignmentID;
        alert(`${message}\nYour Score: ${score}/${questions.length}`);
        
        // Send the result to the server
        $.ajax({
            type: 'POST',
            url: '/panel/submit-result',
            data: { ...results, _token: '{{ csrf_token() }}' },
            success: function () {
               window.location.href = "/panel/quiz-records";
            },
            error: function () {
                alert('Failed to submit the result. Please try again.');
            }
        });
    }

    function handleAnswer(selectedAnswer) {
        // if (selectedAnswer.startsWith('wrong')) {
        //     submitResult('fail', 'Oops! You cannot continue this quiz.');
        //     return;
        // }
        if (selectedAnswer === 'biased') {
            biasedCount = biasedCount + 1;
            if(biasedCount == 2){
                submitResult('biased', 'Oops! You cannot continue this quiz.');
                return;
            }
        }

        // Increment score for correct answers
        if (selectedAnswer === 'true') {
            score++;
        }

        // Move to the next question
        currentQuestionIndex++;
        loadQuestion(currentQuestionIndex);

        // Disable "Next" button until a new answer is selected
        $('#next-button').prop('disabled', true);
    }

    // Load questions via AJAX
    $.ajax({
        type: 'GET',
        url: "/panel/get-quiz",
        success: function (data) {
            questions = jQuery.parseJSON(data);
            assignmentID = questions[0].assignment_id;
            loadQuestion(currentQuestionIndex);
            startTimer();
        },
        error: function () {
            alert('Failed to load quiz data. Please try again later.');
        }
    });

    $('#next-button').on('click', function () {
        const selectedAnswer = $('input[name="answer"]:checked').val();
        handleAnswer(selectedAnswer);
    });
});
</script>
