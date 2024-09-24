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
use Illuminate\Support\Facades\Route;


Route::get("/", [HomepageController::class, "homepage"]);
Route::get("/ai-chatbot", [HomepageController::class, "chatbot"])->name('ai-chatbot');
Route::post("/chat-message", [HomepageController::class, "chatMessage"])->name('chat-message');
Route::get("/login", [AuthController::class, "login"]);
Route::post("/login", [AuthController::class, "auth_login"]);

Route::get("logout", [AuthController::class, "logout"]);

Route::middleware('auth')->group(function () {
    Route::get("panel/dashboard", [DashboardController::class, "dashboard"]);
    Route::get("panel/user", [UserController::class, "list"]);
    Route::post("panel.lockscreen", [LockscreenController::class, 'lockscreen']);


    Route::get("panel/role", [RoleController::class, "list"]);
    Route::get("panel/role/add", [RoleController::class, "add"]);
    Route::post("panel/role/add", [RoleController::class, "insert"]);
    Route::get("panel/role/edit/{id}", [RoleController::class, "edit"]);
    Route::post("panel/role/edit/{id}", [RoleController::class, "update"]);
    Route::get("panel/role/delete/{id}", [RoleController::class, "delete"]);


    Route::get("panel/jury", [JurorController::class, "list"]);
    Route::get("panel/jury/add", [JurorController::class, "add"]);
    Route::post("panel/jury/add", [JurorController::class, "insert"]);
    Route::get("panel/jury/edit/{id}", [JurorController::class, "edit"]);
    Route::post("panel/jury/edit/{id}", [JurorController::class, "update"]);
    Route::get("panel/jury/delete/{id}", [JurorController::class, "delete"]);
    Route::get("panel/jury/assign", [JurorController::class, "assign"]);

    Route::get("panel/case", [CourtCaseController::class, "list"]);
    Route::get("panel/case/add", [CourtCaseController::class, "add"]);
    Route::post("panel/case/add", [CourtCaseController::class, "insert"]);
    Route::get("panel/case/edit/{id}", [CourtCaseController::class, "edit"]);
    Route::post("panel/case/edit/{id}", [CourtCaseController::class, "update"]);
    Route::get("panel/case/delete/{id}", [CourtCaseController::class, "delete"]);

    Route::get("panel/court", [CourtController::class, "list"]);
    Route::get("panel/court/add", [CourtController::class, "add"]);
    Route::post("panel/court/add", [CourtController::class, "insert"]);
    Route::get("panel/court/edit/{id}", [CourtController::class, "edit"]);
    Route::post("panel/court/edit/{id}", [CourtController::class, "update"]);
    Route::get("panel/court/delete/{id}", [CourtController::class, "delete"]);

    Route::get("panel/judge", [JudgeController::class, "list"]);
    Route::get("panel/judge/add", [JudgeController::class, "add"]);
    Route::post("panel/judge/add", [JudgeController::class, "insert"]);
    Route::get("panel/judge/edit/{id}", [JudgeController::class, "edit"]);
    Route::post("panel/judge/edit/{id}", [JudgeController::class, "update"]);
    Route::get("panel/judge/delete/{id}", [JudgeController::class, "delete"]);

    Route::get("panel/summon", [SummonController::class, "list"]);
    Route::get("panel/summon/add", [SummonController::class, "add"])->name("panel/summon/add");
    Route::post("panel/summon/add", [SummonController::class, "insert"]);
    Route::get("panel/summon/edit/{id}", [SummonController::class, "edit"]);
    Route::post("panel/summon/edit/{id}", [SummonController::class, "update"]);
    Route::get("panel/summon/delete/{id}", [SummonController::class, "delete"]);
    // Route::get("panel/summon/assign", [SummonController::class, "assign"]);


    Route::get("panel/questionnaire", [QuestionnaireController::class, "list"]);
    Route::get("panel/questionnaire/add", [QuestionnaireController::class, "add"]);
    Route::post("panel/questionnaire/add", [QuestionnaireController::class, "insert"]);
    Route::get("panel/questionnaire/edit/{id}", [QuestionnaireController::class, "edit"]);
    Route::post("panel/questionnaire/edit/{id}", [QuestionnaireController::class, "update"]);
    Route::get("panel/questionnaire/delete/{id}", [QuestionnaireController::class, "delete"]);

    // Assign Jury
    Route::get("panel/assignjury/add", [AssignJuryController::class, "add"]);
    Route::post("panel/assignjury/add", [AssignJuryController::class, "insert"]);
    Route::get("panel/assignjury/list", [AssignJuryController::class, "list"]);

    Route::get("panel/assignjudge/add", [AssignJudgeController::class, "add"]);
    Route::post("panel/assignjudge/add", [AssignJudgeController::class, "insert"]);
    Route::get("panel/assignjudge/list", [AssignJudgeController::class, "list"]);

    // User cases
    Route::get("view-cases/{user_id}", [AssignJudgeController::class, "viewCases"]);

    // Court Report Routes
    Route::get("court-report", [ReportController::class, "courtReport"]);
    Route::post("generate-court-report", [ReportController::class, "generateCourtReport"])->name('generate-court-report');

    // Case Report Routes
    Route::get("case-report", [ReportController::class, "caseReport"]);
    Route::post("generate-case-report", [ReportController::class, "generateCaseReport"])->name('generate-case-report');
});
