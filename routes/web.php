<?php

use App\Http\Controllers\AssignJudgeController;
use App\Http\Controllers\AssignJuryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourtCaseController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\JurorController;
use App\Http\Controllers\LockscreenController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SummonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssignQuizController;
use App\Http\Controllers\QuizResultController;

use Illuminate\Support\Facades\Route;


Route::get("/", [HomepageController::class, "homepage"]);
Route::get("/ai-chatbot", [HomepageController::class, "chatbot"])->name('ai-chatbot');
Route::post("/chat-message", [HomepageController::class, "chatMessage"])->name('chat-message');
Route::get("/login", [AuthController::class, "login"])->name('login');
Route::post("/login", [AuthController::class, "auth_login"]);

Route::get("logout", [AuthController::class, "logout"])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get("panel/dashboard", [DashboardController::class, "dashboard"]);
    Route::get("panel/user", [UserController::class, "list"]);
    Route::post("panel.lockscreen", [LockscreenController::class, 'lockscreen']);

    // Role ROutes
    Route::get("panel/role", [RoleController::class, "list"]);
    Route::get("panel/role/add", [RoleController::class, "add"]);
    Route::post("panel/role/add", [RoleController::class, "insert"]);
    Route::get("panel/role/edit/{id}", [RoleController::class, "edit"]);
    Route::post("panel/role/edit/{id}", [RoleController::class, "update"]);
    Route::get("panel/role/delete/{id}", [RoleController::class, "delete"]);

    // Jury Routes
    Route::get("panel/jury", [JurorController::class, "list"]);
    Route::get("panel/jury/add", [JurorController::class, "add"]);
    Route::post("panel/jury/add", [JurorController::class, "insert"]);
    Route::get("panel/jury/edit/{id}", [JurorController::class, "edit"]);
    Route::post("panel/jury/edit/{id}", [JurorController::class, "update"]);
    Route::get("panel/jury/delete/{id}", [JurorController::class, "delete"]);
    Route::get("panel/jury/assign", [JurorController::class, "assign"]);
    Route::get("panel/jury/approve/{id}", [JurorController::class, "approveJury"]);
    Route::get("panel/jury/deny/{id}", [JurorController::class, "denyJury"]);
    Route::get("panel/jury/activate/{id}", [JurorController::class, "activateJury"]);
    Route::get("panel/jury/disable/{id}", [JurorController::class, "disableJury"]);

    // Case Route
    Route::get("panel/case", [CourtCaseController::class, "list"]);
    Route::get("panel/case/add", [CourtCaseController::class, "add"]);
    Route::post("panel/case/add", [CourtCaseController::class, "insert"]);
    Route::get("panel/case/edit/{id}", [CourtCaseController::class, "edit"]);
    Route::post("panel/case/edit/{id}", [CourtCaseController::class, "update"]);
    Route::get("panel/case/delete/{id}", [CourtCaseController::class, "delete"]);

    // Court Routes
    Route::get("panel/court", [CourtController::class, "list"]);
    Route::get("panel/court/add", [CourtController::class, "add"]);
    Route::post("panel/court/add", [CourtController::class, "insert"]);
    Route::get("panel/court/edit/{id}", [CourtController::class, "edit"]);
    Route::post("panel/court/edit/{id}", [CourtController::class, "update"]);
    Route::get("panel/court/delete/{id}", [CourtController::class, "delete"]);

    // Judge Routes
    Route::get("panel/judge", [JudgeController::class, "list"]);
    Route::get("panel/judge/add", [JudgeController::class, "add"]);
    Route::post("panel/judge/add", [JudgeController::class, "insert"]);
    Route::get("panel/judge/edit/{id}", [JudgeController::class, "edit"]);
    Route::post("panel/judge/edit/{id}", [JudgeController::class, "update"]);
    Route::get("panel/judge/delete/{id}", [JudgeController::class, "delete"]);
    Route::get("panel/judge/approve/{id}", [JudgeController::class, "approveJudge"]);
    Route::get("panel/judge/deny/{id}", [JudgeController::class, "denyJudge"]);
    Route::get("panel/judge/activate/{id}", [JudgeController::class, "activateJudge"]);
    Route::get("panel/judge/disable/{id}", [JudgeController::class, "disableJudge"]);

    // Summon Routes
    Route::get("panel/summon", [SummonController::class, "list"]);
    Route::get("panel/summon/add", [SummonController::class, "add"])->name("panel/summon/add");
    Route::post("panel/summon/add", [SummonController::class, "insert"]);
    Route::get("panel/summon/edit/{id}", [SummonController::class, "edit"]);
    Route::post("panel/summon/edit/{id}", [SummonController::class, "update"]);
    Route::get("panel/summon/delete/{id}", [SummonController::class, "delete"]);
    // Route::get("panel/summon/assign", [SummonController::class, "assign"]);

    // Quiz Routes
    Route::get("panel/questionnaire", [QuestionnaireController::class, "list"]);
    Route::get("panel/questionnaire/add", [QuestionnaireController::class, "add"]);
    Route::post("panel/questionnaire/add", [QuestionnaireController::class, "insert"]);
    Route::get("panel/questionnaire/edit/{id}", [QuestionnaireController::class, "edit"]);
    Route::post("panel/questionnaire/edit/{id}", [QuestionnaireController::class, "update"]);
    Route::get("panel/questionnaire/delete/{id}", [QuestionnaireController::class, "delete"]);

    // Quiz Assignment
    Route::get("panel/quiz-assigment", [AssignQuizController::class, "quizAssignmentForm"]);
    Route::post("panel/quiz-assigment", [AssignQuizController::class, "assignQuizToJuror"]);
    Route::get("panel/view/quiz-assigment", [AssignQuizController::class, "viewQuizAssignment"]);
    Route::get("panel/view-pending-quiz", [AssignQuizController::class, "viewPendingQuiz"]);
    Route::post("panel/view-pending-quiz", [AssignQuizController::class, "attemptQuiz"]);
    Route::get("panel/start-quiz", [AssignQuizController::class, "startQuiz"]);
    Route::get("panel/get-quiz", [AssignQuizController::class, "getQuiz"]);

    // Quiz Result Routes
    Route::post("panel/submit-result", [QuizResultController::class, "submitResult"]);
    Route::get("panel/quiz-records", [QuizResultController::class, "quizRecords"]);

    // Assign Jury
    Route::get("panel/assignjury/add", [AssignJuryController::class, "add"]);
    Route::post("panel/assignjury/add", [AssignJuryController::class, "insert"]);
    Route::get("panel/assignjury/list", [AssignJuryController::class, "list"]);
    // Juror cases
    Route::get("view-jury-cases/{user_id}", [AssignJuryController::class, "viewCases"]);

    Route::get("panel/assignjudge/add", [AssignJudgeController::class, "add"]);
    Route::post("panel/assignjudge/add", [AssignJudgeController::class, "insert"]);
    Route::get("panel/assignjudge/list", [AssignJudgeController::class, "list"]);
    // Judge cases
    Route::get("view-judge-cases/{user_id}", [AssignJudgeController::class, "viewCases"]);

    // Court Report Routes
    Route::get("court-report", [ReportController::class, "courtReport"]);
    Route::post("generate-court-report", [ReportController::class, "generateCourtReport"])->name('generate-court-report');

    // Case Report Routes
    Route::get("case-report", [ReportController::class, "caseReport"]);
    Route::post("generate-case-report", [ReportController::class, "generateCaseReport"])->name('generate-case-report');

    // Summon Report Routes
    Route::get("summon-report", [ReportController::class, "summonReport"]);
    Route::post("generate-summon-report", [ReportController::class, "generateSummonReport"])->name('generate-summon-report');
});

// Register Judge
Route::get("register-judge", [JudgeController::class, "registerJudge"]);
Route::post("register-judge", [JudgeController::class, "insert"]);

// Register Jury
Route::get("register-jury", [JurorController::class, "registerJuror"]);
Route::post("register-jury", [JurorController::class, "insert"]);
