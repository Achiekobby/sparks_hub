<?php

use Illuminate\Support\Facades\Route;

//* AuthControllers
use App\Http\Controllers\Auth\AdminAuthenticationController;

//* AdminControllers
use App\Http\Controllers\Admin\AdminCrowdfundingOperationsController;
use App\Http\Controllers\Admin\AdminOrganizationController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminWithdrawalRequestController;
use App\Http\Controllers\Admin\AdminP2PTransactionController;



Route::group(['prefix'=>'admin'],function(){

    // Tip:: Register a new user as an admin
    Route::post('add_admin',[AdminAuthenticationController::class,'new_admin_register']);

    //Tip:: Login an admin
    Route::post('login',[AdminAuthenticationController::class,'login']);

    //Tip:: Changing user Admin Privileges
    Route::post("change_admin_state/{unique_id}",[AdminAuthenticationController::class,"change_user_admin_status"]);

    //Tip:: reset admin password

    //Tip:: Password code resend for new

    //Tip:: List all the crowdfunding projects
    Route::get("projects/all",[AdminCrowdfundingOperationsController::class,"list_projects"]);

    //Tip:: Approving crowdfunding project
    Route::get("approve/project/{unique_id}",[AdminCrowdfundingOperationsController::class, 'approve_project']);

    //Tip:: Rejecting crowdfunding project
    Route::post("reject/project",[AdminCrowdfundingOperationsController::class, 'reject_project']);

    //Tip:: List all the organization projects
    Route::get("groups/all",[AdminOrganizationController::class,"list_organizations"]);

    //Tip:: Approving organization project
    Route::get("approve/group/{unique_id}",[AdminOrganizationController::class, 'approve_organization']);

    //Tip:: Rejecting organization project
    Route::post("reject/group",[AdminOrganizationController::class, 'reject_organization']);


    //?INFORMATION => THE FOLLOWING API HAS TO WITH THE ADMIN SETTINGS
    //Tip:: Add new category for crowdfunding projects
    Route::post('category/add',[AdminSettingsController::class,'add_category']);

    //Tip:: Update category for crowdfunding projects
    Route::patch('category/update/{id}',[AdminSettingsController::class,'update_category']);

    //Tip:: Remove category for crowdfunding projects
    Route::delete('category/remove/{id}',[AdminSettingsController::class,'delete_category']);

    //Tip:: Show All category for crowdfunding projects
    Route::get('category/all',[AdminSettingsController::class,'show_all_category']);

    //Tip:: Show category for crowdfunding projects
    Route::get('category/{id}',[AdminSettingsController::class,'show_category']);


    //? INFORMATION => EXTRACTING ALL THE USERS IN THE SYSTEM
    Route::get('users',[AdminAuthenticationController::class,'get_all_users']);
    Route::post('user/status_change',[AdminAuthenticationController::class,'change_user_status']);

    //? WITHDRAWAL REQUESTS
    Route::get("withdrawal_request/pending",[AdminWithdrawalRequestController::class,'pending_withdrawal_requests']);
    Route::post("withdrawal_request/change_status",[AdminWithdrawalRequestController::class,'change_withdrawal_request_status']);

    Route::get("/group/withdrawal/request",[AdminP2PTransactionController::class,"payout_request"]);

    //Tip:: Extract all the payouts admins have initiated
    Route::get("group/payouts",[AdminP2PTransactionController::class,"extract_group_payouts"]);

    //Tip:: Recording a manual payout
    Route::get("group/manual/payout/{withdrawal_request}",[AdminP2PTransactionController::class,"finalize_payout"]);

    //Tip:: Extract the payouts for a specified group
    Route::get("group/completed/payouts/{group_uuid}",[AdminP2PTransactionController::class,"group_payouts"]);
});
?>
