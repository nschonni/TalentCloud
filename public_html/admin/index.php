<?php //header('Content-Type: text/html; charset=utf-8');  ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor . 
-->
<html lang="en">
    <head>
        <title>GC Talent Cloud</title>
        <?php include '../inc/head.php'; ?>
        <?php include '../inc/head-admin.php'; ?>
    </head>

    <body>
        <ul id="wb-tphp">
            <li class="wb-slc">
                <a class="wb-sl" href="#jobs">Skip to available jobs</a>
            </li>
        </ul>

        <?php include '../inc/fip.php'; ?>
        <?php include '../inc/nav-admin.php'; ?>

        <!-- A top-level dialog or overlay elements should be children of this div-->
        <div id="overlays">
            <div id="registerFormOverlay" class="hidden">
                <div id="registerFormWrapperWindow" class="registerFormWrapperWindow">
                    <div class="wb-frmvld wb-init">
                        <form name="registerForm" id="registerForm" novalidate="novalidate" onsubmit="return UserAPI.register(true);" method="post" enctype="application/x-www-form-urlencoded">
                            <div style="height:50px;line-height:50px;vertical-align: middle;">
                                <h3 style="height:50px;line-height:50px;"><img src="/images/logo.svg" style="height:50px;vertical-align: middle;" id="registerLogoImage" alt="registerLogoImage"/> &nbsp; &nbsp;Registration</h3>
                            </div>
                            <div class="form-group">
                                <label for="register_email">
                                    <span>Email</span>
                                    <strong id="register_email_error" class="error hidden">
                                        <span id="register_email_error_msg" class="label label-danger"></span>
                                    </strong>
                                </label>
                                <input class="form-control form-textbox" id="register_email" name="register_email" type="text"/>
                            </div>
                            <div class="form-group">
                                <label for="register_password">
                                    <span>Password (min. 6 characters)</span>
                                    <strong id="register_password_error" class="error hidden">
                                        <span id="register_password_error_msg" class="label label-danger"></span>
                                    </strong>
                                </label>
                                <input class="form-control form-textbox" id="register_password" name="register_password" type="password"/>
                            </div>
                            <div class="form-group">
                                <label for="register_password_confirm">
                                    <span>Confirm password</span>
                                    <strong id="register_password_confirm_error" class="error hidden">
                                        <span id="register_password_confirm_error_msg" class="label label-danger"></span>
                                    </strong>
                                </label>
                                <input class="form-control form-textbox" id="register_password_confirm" name="register_password_confirm" type="password"/>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary" value="Register">
                                <input type="button" class="btn btn-default" value="Cancel" onclick="UserAPI.hideRegisterForm()">
                            </div>
                            <div style="margin: 1em 0 0 0;">
                                <p> Already have an account? <a href="javascript:void(0)" onclick="UserAPI.hideRegisterForm(); return UserAPI.showLogin(this);" class="ui-link">Login</a></p>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
            <div id="loginOverlay" class="hidden" role="dialog" aria-labelledby="loginTitle" aria-describedby="loginFormDescription">
                <div id="loginFormWrapperWindow" class="loginFormWrapperWindow">
                    <form name="loginForm" id="loginForm" method="post" enctype="application/x-www-form-urlencoded">
                        <div id='loginTitleWrapper'>
                            <h3 id='loginTitle' title="Login to TalentCloud"><img src="/images/logo.svg" id="loginLogoImage" alt="Login Logo Image"/> &nbsp; &nbsp;Login</h3>
                            <div class="hidden" id="loginFormDescription">Login to TalentCloud</div>
                        </div>
                        <div class="label label-danger hidden" id="loginErrors"></div>
                        <div class="form-group">
                            <label for="login_email">
                                <span>Email address:</span>
                                <strong id="login_email_error" class="error hidden">
                                    <span id="login_email_error_msg" class="label label-danger"></span>
                                </strong>
                            </label>
                            <div>
                                <input class="form-control full-width" type="email" name="login_email" id="login_email" required=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="login_password">
                                <span>Password:</span>
                                <strong id="login_password_error" class="error hidden">
                                    <span id="login_password_error_msg" class="label label-danger"></span>
                                </strong>
                            </label>
                            <div>
                                <input class="form-control full-width" type="password" name="login_password" id="login_password" required=""/>
                            </div>
                        </div>
                        <div style="margin: 2em 0 0 0;">
                            <input type="button" id="login_button" value="Login" class="btn btn-primary" onclick="return UserAPI.login()"/>
                            <input type="button" id="login_cancel_button" value="Cancel" class="btn btn-default" onclick="UserAPI.cancelLogin()"/>
                        </div>
                    </form>
                    <div style="margin: 1em 0 0 0;">
                        <a href="javascript:void(0)">Forgot your password? Click here to reset it. (Not working yet.)</a>
                    </div>
                    <div style="margin: 1em 0 0 0;">
                        <p><a href="javascript:void(0)" onclick="UserAPI.cancelLogin(); return UserAPI.showRegisterForm(this);" class="ui-link" id="switchToRegister" title="Don't have an account? Click here to register.">Don't have an account? Click here to register</a></p>
                    </div>
                </div>
            </div>
            <div id="profilePicUploadOverlay" class="hidden">
                <div id="profilePicUploadWrapperWindow">
                    <h1>Choose new profile img or drag and drop onto zone below</h1>
                    <div class="fileUpload">
                        <div style="float:left;width:50%;">
                            <div>
                                <input type="file" id="profilePicUploadField" class="fileInput" name="Profile Pic" accept="image/*" />
                            </div>
                            <div id="profilePicUploadDrop" class="fileDropZone fileDropZoneNormal">
                                <p>Drop file here</p>
                            </div>
                        </div>
                        <div style="float:left;width:50%;padding:20px 20px;">
                            <div id="fileUploadPreviewPanel" style="min-height:130px;">
                                <a id="profilePicUploadClear" class="fileUploadReset" href="#" title="Remove all files from list">Clear</a>
                                <ul id="profilePicUploadPreview" class="filePreviewList"></ul>
                            </div>
                            <div id="fileUploadButtons">
                                <a id="profilePicUploadBtn" class="btn btn-primary" href="#" title="Upload all files in list">Upload</a>
                                <a href="javascript:void(0)" class="btn btn-default" onclick="CreateEditProfileAPI.hideUploadProfilePic()">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BEGIN - Standard Yes/No Modal Popup-->
            <div class="yesNoModalOverlay hidden" id="yesNoModalOverlay" role="dialog">
                <div id="yesNoModalWindow" class="yesNoModalWindow">
                    <div class="yesNoModalContent">
                        <div id="yesNoModalTitle" class="yesNoModalTitle">Title</div>
                        <div id="yesNoModalText" class="yesNoModalText">Text</div>
                        <div id="modalButtons">
                        </div>
                    </div>
                </div>
            </div>

            <div id="viewJobPosterOverlay" class="viewJobPosterOverlay hidden">
                <div id="viewJobPosterWrapperWindow" class="viewJobPosterWrapperWindow">
                    <div class="closeButton">
                        <a href="javascript:JobPostAPI.hideJobPoster()" class="closeButtonLink"> </a>
                    </div>
                    <div id="jobPoster" class="jobPoster">

                    </div>
                </div>
            </div>

            <!-- BEGIN - Update Overlay-->
            <div class="yesNoModalOverlay hidden" id="updateOverlay">
                <div id="updateWindow" class="yesNoModalWindow">
                    <div class="updateContent">
                        <img src="/images/working.gif" alt=""/>
                    </div>
                </div>
            </div>
        </div>
        <main class="contentContainer">
            <section class="section" id="jobSeekersSection">
                <div id="jobSeekers">
                    <div id="noJobSeekers" class="hidden">
                        No job seekers found
                    </div>
                    <div id="loadingJobSeekers" class="hidden">
                        <img src="/images/working.gif" alt="loading job seekers"/>
                    </div>
                    <div id="jobSeekerList" class="jobSeekerList hidden">

                    </div>
                </div>
                <div class="jobSeekerCount hidden">
                    <span id="contactCount">0</span> job seekers
                </div>
            </section>
            <section id="createEditProfileSection" class="section hidden">
                <div id="createEditProfile" class="createEditProfile">
                    <h2 id="createJobPosterWindowTitle" class="section--title">Create a new Job Poster</h2>
                    <div class="wb-frmvld wb-init">
                        <div class="tabbedForm">
                            <div class="section">
                                <h2>Create/Edit Profile</h2>
                            <div style="height:50px;line-height:50px;vertical-align: middle;">
                                <h3 style="height:50px;line-height:50px;"><img src="/images/logo.svg" style="height:50px;vertical-align: middle;" id="createProfileLogoImage" alt="createEditProfile"/> &nbsp; &nbsp;<span id="createProfileWindowTitle">Create Profile</span></h3>
                            </div>
                            <!-- Where the old steps resided -->
                            <form method="post" name="CreateEditProfileForm" id="CreateEditProfileForm">
                                <input type="hidden" id="UserId"/>
                                <input type="hidden" id="ManagerProfileId"/>
                                <input type="hidden" id="ManagerProfileDetailsId"/>
                                <div id="profileCommon">
                                    <div>
                                        <div style='display:block;text-align:center;'>
                                            <div style='display:inline-block;height:200px;width:200px;position:relative;'>
                                                <div style='margin:0px auto !important;position:absolute;'>
                                                    <img id='profile_image_preview' src='/images/profile_off.svg' style='width:200px;height:200px;border-radius: 50%;border:1px solid #ccc;'/>
                                                </div>
                                                <div style='margin:0px auto !important;position:absolute;right:0.75em;bottom:0.75em;'>
                                                    <a href="javascript:void(0)" id="editMyProfilePic" onclick="CreateEditProfileAPI.showUploadProfilePic()">
                                                        <img id="editMyProfilePicImg" src="../images/edit_black.svg" class="editImage" style="width:40px;height:40px;background-color: #ccc;border-radius: 50%;border:1px solid #ccc;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style='text-align: center;width:100%;'>
                                        <div style='width:500px;margin:1em auto;text-align: center;'>
                                            <span id="createEditProfile_name_preview" style="font-size:1.5em;">name</span>
                                        </div>
                                    </div>
                                    <div style='text-align: center;width:100%;'>
                                        <div style='width:500px;margin:1em auto;text-align: center;'>
                                            <span id="createEditProfile_position_preview">position</span>
                                        </div>
                                    </div>
                                    <div style='text-align: center;width:100%;'>
                                        <div style='width:500px;margin:1em auto;text-align: center;'>
                                            <span id="createEditProfile_department_preview">department</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="createEditProfile_step1" class="stepGroup_createEditProfile">
                                    <div class="tabsWrapper">
                                        <div class="tabsSteps">
                                    <div class="three-step-tab tab-current"><span id="createEditProfileStep1Label_1">About</span></div>
                                    <div class="three-step-tab"><span id="createEditProfileStep2Label_1">Leadership</span></div>
                                    <div class="three-step-tab"><span id="createEditProfileStep3Label_1">Other</span></div>
                                        </div>
                                        <div class="tabs">
                                            <div class="steptab active"> </div>
                                            <div class="steptab inactive"> </div>
                                            <div class="steptab inactive"> </div>
                                        </div>
                                    </div>
                                    <div class="stepGroupForm">
                                        <h3>About Me</h3>
                                        <div style="margin-top:2em;">
                                            <div class="createEditProfileEnglishPane">
                                                <div class="form-group">
                                                    <label for="createEditProfile_bio">
                                                        <span id="createEditProfile_bio_label">A little bit about me</span>
                                                        <strong id="createEditProfile_bio_error" class="error hidden">
                                                            <span id="createEditProfile_bio_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <textarea class="form-control full-width" name="createEditProfile_bio" id="createEditProfile_bio"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_proudOf">
                                                        <span id="createEditProfile_proudOf_label">What I'm most proud of in my career</span>
                                                        <strong id="createEditProfile_branch_error" class="error hidden">
                                                            <span id="createEditProfile_branch_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <textarea class="form-control full-width" name="createEditProfile_proudOf" id="createEditProfile_proudOf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_branch">
                                                        <span id="createEditProfile_branch_label">Position</span>
                                                        <strong id="createEditProfile_branch_error" class="error hidden">
                                                            <span id="createEditProfile_department_fr_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <input type="text" class="form-control full-width" name="createEditProfile_position" id="createEditProfile_position"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_department">
                                                        <span id="createEditProfile_department_label">Department</span>
                                                        <strong id="createEditProfile_department_error" class="error hidden">
                                                            <span id="createEditProfile_department_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <input type="text" class="form-control full-width" name="createEditProfile_department" id="createEditProfile_department"/>
                                                        <!--select class="form-control full-width" name="createEditProfile_department" id="createEditProfile_department">
                                                            <option value="">--</option>
                                                        </select-->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_branch">
                                                        <span id="createEditProfile_branch_label">Branch</span>
                                                        <strong id="createEditProfile_branch_error" class="error hidden">
                                                            <span id="createEditProfile_branch_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <select class="form-control full-width" name="createEditProfile_branch" id="createEditProfile_branch">
                                                            <option value="">--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_division">
                                                        <span id="createEditProfile_division_label">Division</span>
                                                        <strong id="createEditProfile_division_error" class="error hidden">
                                                            <span id="createEditProfile_division_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <select class="form-control full-width" name="createEditProfile_division" id="createEditProfile_division">
                                                            <option value="">--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_twitter">
                                                        <span id="createEditProfile_twitter_label">Twitter</span>
                                                        <strong id="createEditProfile_twitter_error" class="error hidden">
                                                            <span id="createEditProfile_twitter_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <input class="form-control full-width" type="text" name="createEditProfile_twitter" id="createEditProfile_twitter" placeholder="@Username"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_linkedin">
                                                        <span id="createEditProfile_linkedin_label">LinkedIn</span>
                                                        <strong id="createEditProfile_linkedin_error" class="error hidden">
                                                            <span id="createEditProfile_linkedin_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <input class="form-control full-width" type="text" name="createEditProfile_linkedin" id="createEditProfile_linkedin" placeholder="www.linkedin.com/in/Username"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="createEditProfileFrenchPane">
                                                <div class="form-group hidden">
                                                    <label for="createEditProfile_name_fr">
                                                        <span id="createEditProfile_name_fr_label">Name_fr: *</span>
                                                        <strong id="createEditProfile_name_fr_error" class="error hidden">
                                                            <span id="createEditProfile_name_fr_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <input disabled class="form-control full-width" type="text" name="createEditProfile_name_fr" id="createEditProfile_name_fr"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_bio_fr">
                                                        <span id="createEditProfile_bio_fr_label">A little bit about me_fr: *</span>
                                                        <strong id="createEditProfile_bio_fr_error" class="error hidden">
                                                            <span id="createEditProfile_bio_fr_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <textarea class="form-control full-width" name="createEditProfile_bio_fr" id="createEditProfile_bio_fr"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group hidden">
                                                    <label for="createEditProfile_department_fr">
                                                        <span id="createEditProfile_department_fr_label">Department_fr: *</span>
                                                        <strong id="createEditProfile_department_fr_error" class="error hidden">
                                                            <span id="createEditProfile_department_fr_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <input class="form-control full-width" type="text" name="createEditProfile_department_fr" id="createEditProfile_department_fr"/>
                                                    </div>
                                                </div>
                                                <div class="form-group hidden">
                                                    <label for="createEditProfile_position_fr">
                                                        <span id="createEditProfile_position_fr_label">Position_fr: *</span>
                                                        <strong id="createEditProfile_position_fr_error" class="error hidden">
                                                            <span id="createEditProfile_position_fr_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <input class="form-control full-width" type="text" name="createEditProfile_position_fr" id="createEditProfile_position_fr"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_branch_fr">
                                                        <span id="createEditProfile_branch_fr_label">What I'm most proud of in my career_fr</span>
                                                        <strong id="createEditProfile_branch_fr_error" class="error hidden">
                                                            <span id="createEditProfile_branch_fr_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <textarea class="form-control full-width" name="createEditProfile_branch_fr" id="createEditProfile_branch_fr"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group hidden">
                                                    <label for="createEditProfile_division_fr">
                                                        <span id="createEditProfile_division_fr_label">Division_fr: *</span>
                                                        <strong id="createEditProfile_division_fr_error" class="error hidden">
                                                            <span id="createEditProfile_division_fr_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <input class="form-control full-width" type="text" name="createEditProfile_division_fr" id="createEditProfile_division_fr"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="createEditProfileSubmitPane">
                                            <div class="formGroup insert"><span>*</span><span id="createEditProfile_requiredStep1">Required</span></div>
                                            <div class="formGroup">
                                                <input type="button" id="createEditProfile_goToStep2_1" value="Save" onclick="CreateEditProfileAPI.validateStep1();"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="createEditProfile_step2" class="stepGroup_createEditProfile hidden">
                                    <div class="tabsWrapper">
                                        <div class="tabsSteps">
                                    <div class="three-step-tab"><span id="createEditProfileStep1Label_2">Step 1</span></div>
                                    <div class="three-step-tab tab-current"><span id="createEditProfileStep2Label_2">Step 2</span></div>
                                    <div class="three-step-tab"><span id="createEditProfileStep3Label_2">Review</span></div>
                                        </div>
                                        <div class="tabs">
                                            <div class="steptab active"> </div>
                                            <div class="steptab inactive"> </div>
                                            <div class="steptab inactive"> </div>
                                        </div>
                                    </div>
                                    <div class="stepGroupForm">
                                        <h3>Leadership Style</h3>
                                        <div style="margin-top:2em;overflow:auto;">
                                            <div class="createEditProfileEnglishPane">
                                                <div class="form-group">
                                                    <label for="createEditProfile_leadership_style">
                                                        <span id="createEditProfile_leadership_style_label">My leadership style</span>
                                                        <strong id="createEditProfile_leadership_style_error" class="error hidden">
                                                            <span id="createEditProfile_leadership_style_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <textarea class="form-control full-width" name="createEditProfile_leadership_style" id="createEditProfile_leadership_style"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_app_to_employees">
                                                        <span id="createEditProfile_app_to_employees_label">My approach to employee learning and development</span>
                                                        <strong id="createEditProfile_app_to_employees_error" class="error hidden">
                                                            <span id="createEditProfile_app_to_employees_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <textarea class="form-control full-width" name="createEditProfile_app_to_employees" id="createEditProfile_app_to_employees"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_exp_of_employees">
                                                        <span id="createEditProfile_exp_of_employees_label">My expectations of employees</span>
                                                        <strong id="createEditProfile_exp_of_employees_error" class="error hidden">
                                                            <span id="createEditProfile_exp_of_employees_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <textarea class="form-control full-width" name="createEditProfile_exp_of_employees" id="createEditProfile_exp_of_employees"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="createEditProfileFrenchPane">
                                                <div class="form-group">
                                                    <label for="createEditProfile_leadership_style_fr">
                                                        <span id="createEditProfile_leadership_style_fr_label">Leadership Style_fr: *</span>
                                                        <strong id="createEditProfile_leadership_style_fr_error" class="error hidden">
                                                            <span id="createEditProfile_leadership_style_fr_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <textarea class="form-control full-width" name="createEditProfile_leadership_style_fr" id="createEditProfile_leadership_style_fr"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_app_to_employees_fr">
                                                        <span id="createEditProfile_app_to_employees_fr_label">Approach to employees_fr: *</span>
                                                        <strong id="createEditProfile_app_to_employees_fr_error" class="error hidden">
                                                            <span id="createEditProfile_app_to_employees_fr_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <textarea class="form-control full-width" name="createEditProfile_app_to_employees_fr" id="createEditProfile_app_to_employees_fr"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createEditProfile_exp_of_employees_fr">
                                                        <span id="createEditProfile_exp_of_employees_fr_label">Expectation of employees_fr: *</span>
                                                        <strong id="createEditProfile_exp_of_employees_fr_error" class="error hidden">
                                                            <span id="createEditProfile_exp_of_employees_fr_error_msg" class="label label-danger"></span>
                                                        </strong>
                                                    </label>
                                                    <div>
                                                        <textarea class="form-control full-width" name="createEditProfile_exp_of_employees_fr" id="createEditProfile_exp_of_employees_fr"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <legend>My approach to decision making:</legend>
                                            <div>
                                                <div class="form-group">
                                                    <div class='multi-btn-group-form-group-label'>
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <div style='display:inline-block;width:49%'>
                                                        <div>
                                                            <div style="line-height:2em;font-size:0.8em;">
                                                                <span style="line-height:2em;vertical-align: middle;display:inline-block;width:20%;text-align: left;">10% or less</span>
                                                                <span style="line-height:2em;display:inline-block;width:20%;text-align: center;margin-left:-5px;">~25%</span>
                                                                <span style="line-height:2em;display:inline-block;width:20%;text-align: center;margin-left:-5px;">~50%</span>
                                                                <span style="line-height:2em;display:inline-block;width:20%;text-align: center;margin-left:-5px;">~75%</span>
                                                                <span style="line-height:2em;display:inline-block;width:20%;text-align: right;margin-left:-5px;">90% or more</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="multi-btn-group-form-group">
                                                    <div class='multi-btn-group-form-group-label'>
                                                        <span id="createEditProfile_how_often_review_label">How often do you review your teams work before it is shared?</span>
                                                    </div>
                                                    <div style='display:inline-block;width:48%'>
                                                        <div class="multi-btn-group clearfix">
                                                            <div id='options' style="position:absolute;top:0px;right:0px;width:35em;height:2em;z-index:100">
                                                                <input type="radio" id="option0" name="createEditProfile_how_often_review_options" value="option0" class="accessAid" checked="checked" onfocus="SliderAPI.selectOptionByValue('createEditProfile_review_options', this.value, 'review_options')" />
                                                                <label for="option0" class='option0Label'>Almost never</label>
                                                                <input type="radio" id="option1" name="createEditProfile_how_often_review_options" value="option1" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_review_options', this.value, 'review_options')"/>
                                                                <label for="option1" class='option1Label'>Rarely</label>
                                                                <input type="radio" id="option2" name="createEditProfile_how_often_review_options" value="option2" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_review_options', this.value, 'review_options')"/>
                                                                <label for="option2" class='option2Label'>Sometimes</label>
                                                                <input type="radio" id="option3" name="createEditProfile_how_often_review_options" value="option3" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_review_options', this.value, 'review_options')"/>
                                                                <label for="option3" class='option3Label'>Usually</label>
                                                                <input type="radio" id="option4" name="createEditProfile_how_often_review_options" value="option4" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_review_options', this.value, 'review_options')"/>
                                                                <label for="option4" class='option4Label'>Almost always</label>
                                                            </div>
                                                            <div id='review_options' class="option0"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="multi-btn-group-form-group">
                                                    <div class='multi-btn-group-form-group-label'>
                                                        <span id="createEditProfile_how_often_early_label">How often do you get in early or stay late to get some extra work done?</span>
                                                    </div>
                                                    <div style='display:inline-block;width:48%'>
                                                        <div class="multi-btn-group clearfix">
                                                            <div id='createEditProfile_staylate_options' style="position:absolute;top:0px;right:0px;width:35em;height:2em;z-index:100">
                                                                <input type="radio" id="staylate_option0" name="createEditProfile_staylate" value="option0" class="accessAid" checked="checked" onfocus="SliderAPI.selectOptionByValue('createEditProfile_staylate', this.value, 'staylate')" />
                                                                <label for="staylate_option0" class='option0Label'>Almost never</label>
                                                                <input type="radio" id="staylate_option1" name="createEditProfile_staylate" value="option1" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_staylate', this.value, 'staylate')"/>
                                                                <label for="staylate_option1" class='option1Label'>Rarely</label>
                                                                <input type="radio" id="staylate_option2" name="createEditProfile_staylate" value="option2" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_staylate', this.value, 'staylate')"/>
                                                                <label for="staylate_option2" class='option2Label'>Sometimes</label>
                                                                <input type="radio" id="staylate_option3" name="createEditProfile_staylate" value="option3" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_staylate', this.value, 'staylate')"/>
                                                                <label for="staylate_option3" class='option3Label'>Usually</label>
                                                                <input type="radio" id="staylate_option4" name="createEditProfile_staylate" value="option4" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_staylate', this.value, 'staylate')"/>
                                                                <label for="staylate_option4" class='option4Label'>Almost always</label>
                                                            </div>
                                                            <div id='staylate' class="option0"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="multi-btn-group-form-group">
                                                    <div class='multi-btn-group-form-group-label'>
                                                        <span>How often do you engage your team before responding to management?</span>
                                                    </div>
                                                    <div style='display:inline-block;width:48%'>
                                                        <div class="multi-btn-group clearfix">
                                                            <div id='createEditProfile_engage_options' style="position:absolute;top:0px;right:0px;width:35em;height:3em;z-index:100">
                                                                <input type="radio" id="engage_option0" name="createEditProfile_engage" value="option0" class="accessAid" checked="checked" onfocus="SliderAPI.selectOptionByValue('createEditProfile_engage', this.value, 'engage')" />
                                                                <label for="engage_option0" class='option0Label'>Almost never</label>
                                                                <input type="radio" id="engage_option1" name="createEditProfile_engage" value="option1" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_engage', this.value, 'engage')"/>
                                                                <label for="engage_option1" class='option1Label'>Rarely</label>
                                                                <input type="radio" id="engage_option2" name="createEditProfile_engage" value="option2" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_engage', this.value, 'engage')"/>
                                                                <label for="engage_option2" class='option2Label'>Sometimes</label>
                                                                <input type="radio" id="engage_option3" name="createEditProfile_engage" value="option3" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_engage', this.value, 'engage')"/>
                                                                <label for="engage_option3" class='option3Label'>Usually</label>
                                                                <input type="radio" id="engage_option4" name="createEditProfile_engage" value="option4" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_engage', this.value, 'engage')"/>
                                                                <label for="engage_option4" class='option4Label'>Almost always</label>
                                                            </div>
                                                            <div id='engage' class="option0"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="multi-btn-group-form-group">
                                                    <div class='multi-btn-group-form-group-label'>
                                                        <span>How often do you approve development opportunities for your employees?</span>
                                                    </div>
                                                    <div style='display:inline-block;width:48%'>
                                                        <div class="multi-btn-group clearfix">
                                                            <div id='createEditProfile_devops' style="position:absolute;top:0px;right:0px;width:35em;height:3em;z-index:100">
                                                                <input type="radio" id="devops_option0" name="createEditProfile_devops" value="option0" class="accessAid" checked="checked" onfocus="SliderAPI.selectOptionByValue('createEditProfile_devops', this.value, 'devops')" />
                                                                <label for="devops_option0" class='option0Label'>Almost never</label>
                                                                <input type="radio" id="devops_option1" name="createEditProfile_devops" value="option1" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_devops', this.value, 'devops')"/>
                                                                <label for="devops_option1" class='option1Label'>Rarely</label>
                                                                <input type="radio" id="devops_option2" name="createEditProfile_devops" value="option2" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_devops', this.value, 'devops')"/>
                                                                <label for="devops_option2" class='option2Label'>Sometimes</label>
                                                                <input type="radio" id="devops_option3" name="createEditProfile_devops" value="option3" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_devops', this.value, 'devops')"/>
                                                                <label for="devops_option3" class='option3Label'>Usually</label>
                                                                <input type="radio" id="devops_option4" name="createEditProfile_devops" value="option4" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_devops', this.value, 'devops')"/>
                                                                <label for="devops_option4" class='option4Label'>Almost always</label>
                                                            </div>
                                                            <div id='devops' class="option0"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="multi-btn-group-form-group">
                                                    <div class='multi-btn-group-form-group-label'>
                                                        <span>How often do you refuse low value work requests from management?</span>
                                                    </div>
                                                    <div style='display:inline-block;width:48%'>
                                                        <div class="multi-btn-group clearfix">
                                                            <div id='createEditProfile_lvwrequests' style="position:absolute;top:0px;right:0px;width:35em;height:3em;z-index:100">
                                                                <input type="radio" id="lvwRequests_option0" name="createEditProfile_lvwrequests" value="option0" class="accessAid" checked="checked" onfocus="SliderAPI.selectOptionByValue('createEditProfile_lvwrequests', this.value, 'lvwRequests')" />
                                                                <label for="lvwRequests_option0" class='option0Label'>Almost never</label>
                                                                <input type="radio" id="lvwRequests_option1" name="createEditProfile_lvwrequests" value="option1" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_lvwrequests', this.value, 'lvwRequests')"/>
                                                                <label for="lvwRequests_option1" class='option1Label'>Rarely</label>
                                                                <input type="radio" id="lvwRequests_option2" name="createEditProfile_lvwrequests" value="option2" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_lvwrequests', this.value, 'lvwRequests')"/>
                                                                <label for="lvwRequests_option2" class='option2Label'>Sometimes</label>
                                                                <input type="radio" id="lvwRequests_option3" name="createEditProfile_lvwrequests" value="option3" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_lvwrequests', this.value, 'lvwRequests')"/>
                                                                <label for="lvwRequests_option3" class='option3Label'>Usually</label>
                                                                <input type="radio" id="lvwRequests_option4" name="createEditProfile_lvwrequests" value="option4" class="accessAid" onfocus="SliderAPI.selectOptionByValue('createEditProfile_lvwrequests', this.value, 'lvwRequests')"/>
                                                                <label for="lvwRequests_option4" class='option4Label'>Almost always</label>
                                                            </div>
                                                            <div id='lvwRequests' class="option0"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="createEditProfileSubmitPane">
                                            <div class="formGroup insert"><span>*</span><span id="createEditProfile_requiredStep2">Required</span></div>
                                            <div class="formGroup">
                                                <input type="button" id="createEditProfile_goToStep1_1" value="Go to Step 2" onclick="CreateEditProfileAPI.goToStep('createEditProfile_step1');">
                                                <input type="button" id="createEditProfile_goToStep3_1" value="Go to Step 3" onclick="CreateEditProfileAPI.validateStep2();">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="createEditProfile_step3" class="stepGroup_createEditProfile hidden">
                                    <div class="tabsWrapper">
                                        <div class="tabsSteps">
                                            <div class="create-profile-tab"><span id="createEditProfileStep1Label_3">Step 1</span></div>
                                            <div class="create-profile-tab"><span id="createEditProfileStep2Label_3">Step 2</span></div>
                                            <div class="create-profile-tab create-profile-tab-current"><span id="createEditProfileStep3Label_3">Review</span></div>
                                        </div>
                                        <div class="tabs">
                                            <div class="steptab active"> </div>
                                            <div class="steptab inactive"> </div>
                                            <div class="steptab inactive"> </div>
                                            <div class="steptab inactive"> </div>
                                            <div class="steptab inactive"> </div>
                                        </div>
                                    </div>
                                    <div class="stepGroupForm">

                                        <fieldset>
                                            <legend>Other</legend>
                                            <div>
                                                <div class="form-group">
                                                    <div class='multi-btn-group-form-group-label'>
                                                        <label for="user_manager_profile_work_experience"><span>Work Experience</span></label>
                                                    </div>
                                                    <div style='display:inline-block;width:49%'>
                                                        <div>
                                                            <textarea id="user_manager_profile_work_experience" name="user_manager_profile_work_experience" class="textAreaInput"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class='multi-btn-group-form-group-label'>
                                                        <label for="user_manager_profile_education"><span>Education</span></label>
                                                    </div>
                                                    <div style='display:inline-block;width:49%'>
                                                        <div>
                                                            <textarea id="user_manager_profile_education" name="user_manager_profile_education" class="textAreaInput"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="createEditProfileSubmitPane">
                                            <div class="formGroup insert"></div>
                                            <div class="formGroup">
                                                <input type="button" id="createEditProfile_goToStep2_2" value="Go to Step 2" onclick="CreateEditProfileAPI.goToStep('createEditProfile_step2');">
                                                <input id="createEditProfileSubmitButton" type="button" value="Submit" onclick="CreateEditProfileAPI.validateStep3();">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="viewProfileContainer" class="contentContainer viewProfileContainer">
                    <div id="viewProfile" class="contentContainer viewProfile hidden">

                    </div>
                </div>
            </section>
            <section class="section hidden" id="createJobPosterSection">
                <h2 class="section--title">Create a new Job Poster</h2>
                <div class="wb-frmvld wb-init tabbedForm" id="jobPosterFormWrapper">
                    <form name="createJobPosterForm" id="createJobPosterForm" method="post" enctype="application/x-www-form-urlencoded">
                        <div id="createJobPosterCreateTab" class="stepGroup">
                            <div class="tabsWrapper">
                                <div class="tabsSteps">
                                    <div class="three-step-tab tab-current"><a href="javascript:void(0)" class="steppedFormLinkActive" onclick="CreateJobPosterAPI.goToTab('createJobPosterCreateTab')" id="createJobPosterTab1Label_1">Create</a></div>
                                    <div class="three-step-tab"><a href="javascript:void(0)" class="steppedFormLink" onclick="CreateJobPosterAPI.goToTab('createJobPosterOutdatedTab')" id="createJobPosterTab2Label_1">Outdated</a></div>
                                    <div class="three-step-tab"><a href="javascript:void(0)" class="steppedFormLink" onclick="CreateJobPosterAPI.goToTab('createJobPosterReviewTab')" id="createJobPosterTab3Label_1">Review</a></div>
                                </div>
                                <div class="tabs">
                                    <div class="steptab active"> </div>
                                    <div class="steptab inactive"> </div>
                                    <div class="steptab inactive"> </div>
                                </div>
                            </div>
                            <div class="stepGroupForm">
                                <section id ="createJobPosterJobTitleSection">
                                    <div class="leftPane">
                                        <div class="form-group">
                                            <label for="createJobPoster_jobTitle">
                                                <span>Job Title: *</span>
                                                <strong id="createJobPoster_jobTitle_error" class="error hidden">
                                                    <span id="createJobPoster_jobTitle_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <input class="form-control full-width" type="text" name="createJobPoster_jobTitle" id="createJobPoster_jobTitle"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rightPane">
                                        <div class="form-group">
                                            <label for="createJobPoster_jobTitle_fr">
                                                <span>Job Title_fr: *</span>
                                                <strong id="createJobPoster_jobTitle_fr_error" class="error hidden">
                                                    <span id="createJobPoster_jobTitle_fr_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <input class="form-control full-width" type="text" name="createJobPoster_jobTitle_fr" id="createJobPoster_jobTitle_fr"/>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section id="createJobPosterDetailsSection">
                                    <div class="singlePane">
                                        <div class="form-group">
                                            <label for="createJobPoster_department">
                                                <span><span id="createJobPoster_department_labelName">Department</span>: *</span>
                                                <strong id="createJobPoster_department_error" class="error hidden">
                                                    <span id="createJobPoster_department_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <select class="form-control full-width" name="createJobPoster_department" id="createJobPoster_department">
                                                <option value="">--</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_province">
                                                <span><span id="createJobPoster_province_labelName">Province</span>: *</span>
                                                <strong id="createJobPoster_province_error" class="error hidden">
                                                    <span id="createJobPoster_province_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <select class="form-control full-width" name="createJobPoster_province" id="createJobPoster_province">
                                                    <option value="">--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="leftPane">                            
                                        <div class="form-group">
                                            <label for="createJobPoster_city">
                                                <span>City: *</span>
                                                <strong id="createJobPoster_city_error" class="error hidden">
                                                    <span id="createJobPoster_city_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <input class="form-control full-width" type="text" name="createJobPoster_city" id="createJobPoster_city"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rightPane">
                                        <div class="form-group">
                                            <label for="createJobPoster_city_fr">
                                                <span>City_fr: *</span>
                                                <strong id="createJobPoster_city_fr_error" class="error hidden">
                                                    <span id="createJobPoster_city_fr_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <input class="form-control full-width" type="text" name="createJobPoster_city_fr" id="createJobPoster_city_fr"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="singlePane">
                                        <div class="form-group">
                                            <label for="createJobPoster_remunerationLowRange">
                                                <span><span id="createJobPoster_remunerationLowRange_labelName">Minimum salary</span>: *</span>
                                                <strong id="createJobPoster_remunerationLowRange_error" class="error hidden">
                                                    <span id="createJobPoster_remunerationLowRange_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <input class="form-control full-width" type="text" name="createJobPoster_remunerationLowRange" id="createJobPoster_remunerationLowRange"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_remunerationHighRange">
                                                <span><span id="createJobPoster_remunerationHighRange_labelName">Maximum salary</span>: *</span>
                                                <strong id="createJobPoster_remunerationHighRange_error" class="error hidden">
                                                    <span id="createJobPoster_remunerationHighRange_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <input class="form-control full-width" type="text" name="createJobPoster_remunerationHighRange" id="createJobPoster_remunerationHighRange"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_termQuantity">
                                                <span><span id="createJobPoster_termQuantity_labelName">Duration (months)</span>: *</span>
                                                <strong id="createJobPoster_termQuantity_error" class="error hidden">
                                                    <span id="createJobPoster_termQuantity_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <input class="form-control full-width" type="text" name="createJobPoster_termQuantity" id="createJobPoster_termQuantity"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_openDate">
                                                <span><span id="createJobPoster_openDate_labelName">Open Date</span>: *</span>
                                                <strong id="createJobPoster_openDate_error" class="error hidden">
                                                    <span id="createJobPoster_openDate_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <input class="form-control full-width" type="datetime-local" name="createJobPoster_openDate" id="createJobPoster_openDate"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_closeDate">
                                                <span><span id="createJobPoster_closeDate_labelName">Close Date</span>: *</span>
                                                <strong id="createJobPoster_closeDate_error" class="error hidden">
                                                    <span id="createJobPoster_closeDate_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <input class="form-control full-width" type="datetime-local" name="createJobPoster_closeDate" id="createJobPoster_closeDate"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_startDate">
                                                <span><span id="createJobPoster_startDate_labelName">Start Date</span>: *</span>
                                                <strong id="createJobPoster_startDate_error" class="error hidden">
                                                    <span id="createJobPoster_startDate_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <input class="form-control full-width" type="date" name="createJobPoster_startDate" id="createJobPoster_startDate"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="leftPane">                            
                                        <div class="form-group">
                                            <label for="createJobPoster_impact">
                                                <span><span id="createJobPoster_impact_labelName">Impact</span>:</span>
                                                <strong id="createJobPoster_impact_error" class="error hidden">
                                                    <span id="createJobPoster_impact_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <textarea class="form-control full-width" name="createJobPoster_impact" id="createJobPoster_impact"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_keyTasks">
                                                <span><span id="createJobPoster_keyTasks_labelName">Key Tasks</span>:</span>
                                                <strong id="createJobPoster_keyTasks_error" class="error hidden">
                                                    <span id="createJobPoster_keyTasks_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <textarea class="form-control full-width" name="createJobPoster_keyTasks" id="createJobPoster_keyTasks"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_coreCompetencies">
                                                <span><span id="createJobPoster_coreCompetencies_labelName">Core Competencies</span>:</span>
                                                <strong id="createJobPoster_coreCompetencies_error" class="error hidden">
                                                    <span id="createJobPoster_coreCompetencies_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <textarea class="form-control full-width" name="createJobPoster_coreCompetencies" id="createJobPoster_coreCompetencies"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_developingCompetencies">
                                                <span><span id="createJobPoster_developingCompetencies_labelName">Developing Competencies</span>:</span>
                                                <strong id="createJobPoster_developingCompetencies_error" class="error hidden">
                                                    <span id="createJobPoster_developingCompetencies_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <textarea class="form-control full-width" name="createJobPoster_developingCompetencies" id="createJobPoster_developingCompetencies"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_otherRequirements">
                                                <span><span id="createJobPoster_otherRequirements_labelName">Other Requirements</span>:</span>
                                                <strong id="createJobPoster_otherRequirements_error" class="error hidden">
                                                    <span id="createJobPoster_otherRequirements_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <textarea class="form-control full-width" name="createJobPoster_otherRequirements" id="createJobPoster_otherRequirements"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rightPane">                            
                                        <div class="form-group">
                                            <label for="createJobPoster_impact_fr">
                                                <span><span id="createJobPoster_impact_fr_labelName">Impact_fr</span>:</span>
                                                <strong id="createJobPoster_impact_fr_error" class="error hidden">
                                                    <span id="createJobPoster_impact_fr_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <textarea class="form-control full-width" name="createJobPoster_impact_fr" id="createJobPoster_impact_fr"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_keyTasks_fr">
                                                <span><span id="createJobPoster_keyTasks_fr_labelName">Key Tasks_fr</span>:</span>
                                                <strong id="createJobPoster_keyTasks_fr_error" class="error hidden">
                                                    <span id="createJobPoster_keyTasks_fr_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <textarea class="form-control full-width" name="createJobPoster_keyTasks_fr" id="createJobPoster_keyTasks_fr"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_coreCompetencies_fr">
                                                <span><span id="createJobPoster_coreCompetencies_fr_labelName">Core Competencies_fr</span>:</span>
                                                <strong id="createJobPoster_coreCompetencies_fr_error" class="error hidden">
                                                    <span id="createJobPoster_coreCompetencies_fr_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <textarea class="form-control full-width" name="createJobPoster_coreCompetencies_fr" id="createJobPoster_coreCompetencies_fr"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_developingCompetencies_fr">
                                                <span><span id="createJobPoster_developingCompetencies_fr_labelName">Developing Competencies</span>:</span>
                                                <strong id="createJobPoster_developingCompetencies_fr_error" class="error hidden">
                                                    <span id="createJobPoster_developingCompetencies_fr_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <textarea class="form-control full-width" name="createJobPoster_developingCompetencies_fr" id="createJobPoster_developingCompetencies_fr"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="createJobPoster_otherRequirements_fr">
                                                <span><span id="createJobPoster_otherRequirements_fr_labelName">Other Requirements_fr</span>:</span>
                                                <strong id="createJobPoster_otherRequirements_fr_error" class="error hidden">
                                                    <span id="createJobPoster_otherRequirements_fr_error_msg" class="label label-danger"></span>
                                                </strong>
                                            </label>
                                            <div>
                                                <textarea class="form-control full-width" name="createJobPoster_otherRequirements_fr" id="createJobPoster_otherRequirements_fr"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <div class="createJobPosterSubmitPane">
                                    <div class="formGroup insert">*Required</div>
                                    <div class="formGroup">
                                        <input type="button" id="createJobPosterSubmitButton" value="Submit" onclick="CreateJobPosterAPI.validateJobPosterForm()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="createJobPosterOutdatedTab" class="stepGroup hidden">
                            <div class="tabsWrapper">
                                <div class="tabsSteps">
                                    <div class="three-step-tab"><a href="javascript:void(0)" class="steppedFormLink" onclick="CreateJobPosterAPI.goToTab('createJobPosterCreateTab')" id="createJobPosterTab1Label_1">Create</a></div>
                                    <div class="three-step-tab tab-current"><a href="javascript:void(0)" class="steppedFormLinkActive" onclick="CreateJobPosterAPI.goToTab('createJobPosterOutdatedTab')" id="createJobPosterTab2Label_1">Outdated</a></div>
                                    <div class="three-step-tab"><a href="javascript:void(0)" class="steppedFormLink" onclick="CreateJobPosterAPI.goToTab('createJobPosterReviewTab')" id="createJobPosterTab3Label_1">Review</a></div>
                                </div>
                                <div class="tabs">
                                    <div class="steptab active"> </div>
                                    <div class="steptab inactive"> </div>
                                    <div class="steptab inactive"> </div>
                                </div>
                            </div>
                            <h3>This is for outdated fields</h3>
                        </div>
                        <div id="createJobPosterReviewTab" class="stepGroup hidden">
                            <div class="tabsWrapper">
                                <div class="tabsSteps">
                                    <div class="three-step-tab"><a href="javascript:void(0)" class="steppedFormLink" onclick="CreateJobPosterAPI.goToTab('createJobPosterCreateTab')" id="createJobPosterTab1Label_3">Create</a></div>
                                    <div class="three-step-tab"><a href="javascript:void(0)" class="steppedFormLink" onclick="CreateJobPosterAPI.goToTab('createJobPosterOutdatedTab')" id="createJobPosterTab2Label_3">Outdated</a></div>
                                    <div class="three-step-tab tab-current"><a href="javascript:void(0)" class="steppedFormLinkActive" onclick="CreateJobPosterAPI.goToTab('createJobPosterReviewTab')" id="createJobPosterTab3Label_3">Review</a></div>
                                </div>
                                <div class="tabs">
                                    <div class="steptab inactive"> </div>
                                    <div class="steptab inactive"> </div>
                                    <div class="steptab active"> </div>
                                </div>
                            </div>
                            <div class="stepGroupForm">
                                <div class="formGroup">
                                    <div class="createJobPosterDemoAreaEnglish" id="createJobPosterDemoAreaEnglish"></div>
                                    <div class="createJobPosterDemoAreaFrench" id="createJobPosterDemoAreaFrench"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <section id="createJobPosterBanner">

                </section>


                <!--        <div id="createJobPosterWrapperWindow" class="createJobPosterWrapperWindow">
                           <div class="closeButton">
                                <a href="javascript:UserAPI.hideJobSeekerProfileForm()" class="closeButtonLink"> </a>
                            </div>
                            <div class="wb-frmvld wb-init">
                                <div class="tabbedForm">
                                    <div class="section">
                                        <h2>Job Poster Entry Form</h2>
                                    </div>
                                    <div><hr></div>
                                        <div style="height:50px;line-height:50px;vertical-align: middle;">
                                            <h3 style="height:50px;line-height:50px;"><img src="/images/logo.svg" style="height:50px;vertical-align: middle;" id="createJobPosterLogoImage" alt="createJobPosterLogoImage"/> &nbsp; &nbsp;<span id="createJobPosterWindowTitle">Create Job Poster</span></h3>
                                        </div>
                                         Where the old steps resided 
                                        <form method="post" name="StudentForm" action="#" id="form47">
                                        <div id="step1" class="stepGroup">
                                            <div class="tabsWrapper">
                                                <div class="tabsSteps">
                                                    <div class="four-step-tab tab-current"><span id="createJobPosterStep1Label_1">Step 1</span></div>
                                                    <div class="four-step-tab"><span id="createJobPosterStep2Label_1">Step 2</span></div>
                                                    <div class="four-step-tab"><span id="createJobPosterStep3Label_1">Step 3</span></div>
                                                    <div class="four-step-tab"><span id="createJobPosterStep4Label_1">Review</span></div>
                                                </div>
                                                <div class="tabs">
                                                    <div class="steptab active"> </div>
                                                    <div class="steptab inactive"> </div>
                                                    <div class="steptab inactive"> </div>
                                                    <div class="steptab inactive"> </div>
                                                    <div class="steptab inactive"> </div>
                                                </div>
                                            </div>
                                            <div class="stepGroupForm">
                                                    <div class="createJobPosterEnglishPane">
                                                        <div class="form-group">
                                                            <label for="createJobPoster_jobTitle">
                                                                <span>Job Title: *</span>
                                                                <strong id="createJobPoster_jobTitle_error" class="error hidden">
                                                                    <span id="createJobPoster_jobTitle_error_msg" class="label label-danger"></span>
                                                                </strong>
                                                            </label>
                                                            <div>
                                                                <input class="form-control full-width" type="text" name="createJobPoster_jobTitle" id="createJobPoster_jobTitle"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="createJobPoster_closeDate">
                                                                <span>Close Date: *</span>
                                                                <strong id="createJobPoster_closeDate_error" class="error hidden">
                                                                    <span id="createJobPoster_closeDate_error_msg" class="label label-danger"></span>
                                                                </strong>
                                                            </label>
                                                            <div>
                                                                <input class="form-control full-width" type="datetime-local" name="createJobPoster_closeDate" id="createJobPoster_closeDate"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="createJobPoster_department">
                                                                <span>Department: *</span>
                                                                <strong id="createJobPoster_department_error" class="error hidden">
                                                                    <span id="createJobPoster_department_error_msg" class="label label-danger"></span>
                                                                </strong>
                                                            </label>
                                                            <div>
                                                                <input class="form-control full-width" type="text" name="createJobPoster_department" id="createJobPoster_department" onkeyup="DepartmentAPI.filterCreateJobPosterDepartments()"/>
                                                            </div>
                                                            <div id="createJobPoster_listOfDepartments">
                                                                <ul>
                                                                    <li>List 1</li>
                                                                    <li>List 2</li>
                                                                </ul>s
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="createJobPosterFrenchPane">
                                                        <div class="form-group">
                                                            <label for="createJobPoster_jobTitle_fr">
                                                                <span>Job Title_fr: *</span>
                                                                <strong id="createJobPoster_jobTitle_fr_error" class="error hidden">
                                                                    <span id="createJobPoster_jobTitle_fr_error_msg" class="label label-danger"></span>
                                                                </strong>
                                                            </label>
                                                            <div>
                                                                <input class="form-control full-width" type="text" name="createJobPoster_jobTitle_fr" id="createJobPoster_jobTitle_fr"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="createJobPoster_closeDate_fr">
                                                                <span>Close Date_fr: *</span>
                                                                <strong id="createJobPoster_closeDate_fr_error" class="error hidden">
                                                                    <span id="createJobPoster_closeDate_fr_error_msg" class="label label-danger"></span>
                                                                </strong>
                                                            </label>
                                                            <div>
                                                                <input disabled class="form-control full-width" type="datetime-local" name="createJobPoster_closeDate_fr" id="createJobPoster_closeDate_fr"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="createJobPoster_department_fr">
                                                                <span>Department_fr: *</span>
                                                                <strong id="createJobPoster_department_fr_error" class="error hidden">
                                                                    <span id="createJobPoster_department_fr_error_msg" class="label label-danger"></span>
                                                                </strong>
                                                            </label>
                                                            <div>
                                                                <input disabled class="form-control full-width" type="text" name="createJobPoster_department_fr" id="createJobPoster_department_fr" onkeyup="DepartmentAPI.filterCreateJobPosterDepartments()"/>
                                                            </div>
                                                            <div id="createJobPoster_listOfDepartments_fr">
                                                                <ul>
                                                                <li>Human Resources</li>
                                                                <li>Accounting</li>
                                                                <li>Fish</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="createJobPosterSubmitPane">
                                                    <div class="formGroup insert">*Required</div>
                                                    <div class="formGroup">
                                                        <input type="button" id="createJobPoster_goToStep2_1" value="Go to Step 2" onclick="CreateJobPosterAPI.validateStep1();">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step2" class="stepGroup hidden">
                                            <div class="tabsWrapper">
                                                <div class="tabsSteps">
                                                    <div class="four-step-tab"><span id="createJobPosterStep1Label_2">Step 1</span></div>
                                                    <div class="four-step-tab tab-current"><span id="createJobPosterStep2Label_2">Step 2</span></div>
                                                    <div class="four-step-tab"><span id="createJobPosterStep3Label_2">Step 3</span></div>
                                                    <div class="four-step-tab"><span id="createJobPosterStep4Label_2">Review</span></div>
                                                </div>
                                                <div class="tabs">
                                                    <div class="steptab active"> </div>
                                                    <div class="steptab active"> </div>
                                                    <div class="steptab inactive"> </div>
                                                    <div class="steptab inactive"> </div>
                                                    <div class="steptab inactive"> </div>
                                                </div>
                                            </div>
                                            <div class="stepGroupForm">
                                                <div class="createJobPosterEnglishPane">
                                                    <div class="form-group">
                                                        <label for="createJobPoster_city">
                                                            <span>City: *</span>
                                                            <strong id="createJobPoster_city_error" class="error hidden">
                                                                <span id="createJobPoster_city_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <select class="form-control full-width" name="createJobPoster_city" id="createJobPoster_city">
                                                                <option value="">--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="createJobPoster_province">
                                                            <span>Province: *</span>
                                                            <strong id="createJobPoster_province_error" class="error hidden">
                                                                <span id="createJobPoster_province_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <select class="form-control full-width" name="createJobPoster_province" id="createJobPoster_province">
                                                                <option value="">--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="createJobPoster_termQuantity">
                                                            <span>Term Quantity: *</span>
                                                            <strong id="createJobPoster_termQuantity_error" class="error hidden">
                                                                <span id="createJobPoster_termQuantity_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <input class="form-control full-width" type="text" name="createJobPoster_termQuantity" id="createJobPoster_termQuantity"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="createJobPoster_termUnits">
                                                            <span>Term Units: *</span>
                                                            <strong id="createJobPoster_termUnits_error" class="error hidden">
                                                                <span id="createJobPoster_termUnits_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div id="jobterms">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="createJobPosterFrenchPane">
                                                    <div class="form-group">
                                                        <label for="createJobPoster_city_fr">
                                                            <span>City_fr: *</span>
                                                            <strong id="createJobPoster_city_fr_error" class="error hidden">
                                                                <span id="createJobPoster_city_fr_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <input class="form-control full-width" type="text" name="createJobPoster_city_fr" id="createJobPoster_city_fr"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="createJobPoster_province_fr">
                                                            <span>Province_fr: *</span>
                                                            <strong id="createJobPoster_province_fr_error" class="error hidden">
                                                                <span id="createJobPoster_province_fr_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <input class="form-control full-width" type="text" name="createJobPoster_province_fr" id="createJobPoster_province_fr"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="createJobPoster_termQuantity_fr">
                                                            <span>Term Quantity_fr: *</span>
                                                            <strong id="createJobPoster_termQuantity_fr_error" class="error hidden">
                                                                <span id="createJobPoster_termQuantity_fr_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <input class="form-control full-width" type="text" name="createJobPoster_termQuantity_fr" id="createJobPoster_termQuantity_fr"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="createJobPoster_termUnits_fr">
                                                            <span>Term Units_fr: *</span>
                                                            <strong id="createJobPoster_termUnits_fr_error" class="error hidden">
                                                                <span id="createJobPoster_termUnits_fr_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <input disabled id="fr_option_weeks" type="radio" name="createJobPoster_termUnits_fr" value="weeks_fr" checked> Weeks_fr<br>
                                                            <input disabled id="fr_option_months" type="radio" name="createJobPoster_termUnits_fr" value="months_fr"> Months_fr<br>
                                                            <input disabled id="fr_option_years" type="radio" name="createJobPoster_termUnits_fr" value="years_fr"> Years_fr<br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="createJobPosterSubmitPane">
                                                    <div class="formGroup insert">*Required</div>
                                                    <div class="formGroup stepNavigation">
                                                        <input type="button" id="createJobPoster_goToStep1" value="Go to Step 1" onclick="CreateJobPosterAPI.goToStep('step1')">
                                                        <input type="button" id="createJobPoster_goToStep3_1"  value="Go to Step 3_1" onclick="CreateJobPosterAPI.validateStep2()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step3" class="stepGroup hidden">
                                            <div class="tabsSteps">
                                                <div class="four-step-tab"><span id="createJobPosterStep1Label_3">Step 1</span></div>
                                                <div class="four-step-tab"><span id="createJobPosterStep2Label_3">Step 2</span></div>
                                                <div class="four-step-tab tab-current"><span id="createJobPosterStep3Label_3">Step 3</span></div>
                                                <div class="four-step-tab"><span id="createJobPosterStep4Label_3">Review</span></div>
                                            </div>
                                            <div class="tabsWrapper">
                                                <div class="tabs">
                                                    <div class="steptab active"> </div>
                                                    <div class="steptab active"> </div>
                                                    <div class="steptab active"> </div>
                                                    <div class="steptab inactive"> </div>
                                                    <div class="steptab inactive"> </div>
                                                </div>
                                            </div>
                                            <div class="stepGroupForm">
                                                <div class="createJobPosterEnglishPane">
                                                    <div class="form-group">
                                                        <label for="createJobPoster_remunerationType">
                                                            <span>Remuneration Type: *</span>
                                                            <strong id="createJobPoster_remunerationType_error" class="error hidden">
                                                                <span id="createJobPoster_remunerationType_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <input class="form-control full-width" type="text" name="createJobPoster_remunerationType" id="createJobPoster_remunerationType"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="createJobPoster_remunerationLowRange">
                                                            <span>Remuneration Range Low: *</span>
                                                            <strong id="createJobPoster_remunerationLowRange_error" class="error hidden">
                                                                <span id="createJobPoster_remunerationLowRange_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <input class="form-control full-width" type="text" name="createJobPoster_remunerationLowRange" id="createJobPoster_remunerationLowRange"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="createJobPoster_remunerationHighRange">
                                                            <span>Remuneration Range High: *</span>
                                                            <strong id="createJobPoster_remunerationHighRange_error" class="error hidden">
                                                                <span id="createJobPoster_remunerationHighRange_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <input class="form-control full-width" type="text" name="createJobPoster_remunerationHighRange" id="createJobPoster_remunerationHighRange"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="createJobPosterFrenchPane">
                                                    <div class="form-group">
                                                        <label for="createJobPoster_remunerationType_fr">
                                                            <span>Remuneration Type_fr: *</span>
                                                            <strong id="createJobPoster_remunerationType_fr_error" class="error hidden">
                                                                <span id="createJobPoster_remunerationType_fr_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <input class="form-control full-width" type="text" name="createJobPoster_remunerationType_fr" id="createJobPoster_remunerationType_fr"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="createJobPoster_remunerationLowRange_fr">
                                                            <span>Remuneration Range Low_fr: *</span>
                                                            <strong id="createJobPoster_remunerationLowRange_fr_error" class="error hidden">
                                                                <span id="createJobPoster_remunerationLowRange_fr_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <input class="form-control full-width" type="text" name="createJobPoster_remunerationLowRange_fr" id="createJobPoster_remunerationLowRange_fr"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="createJobPoster_remunerationHighRange_fr">
                                                            <span>Remuneration Range High_fr: *</span>
                                                            <strong id="createJobPoster_remunerationHighRange_fr_error" class="error hidden">
                                                                <span id="createJobPoster_remunerationHighRange_fr_error_msg" class="label label-danger"></span>
                                                            </strong>
                                                        </label>
                                                        <div>
                                                            <input class="form-control full-width" type="text" name="createJobPoster_remunerationHighRange_fr" id="createJobPoster_remunerationHighRange_fr"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="createJobPosterSubmitPane">
                                                    <div class="formGroup insert">*Required</div>
                                                    <div class="formGroup">
                                                        <input type="button" id="createJobPoster_goToStep2_2" value="Go to Step 2" onclick="CreateJobPosterAPI.goToStep('step2')">
                                                        <input type="button" id="createJobPoster_goToReview"  value="Go to Review" onclick="CreateJobPosterAPI.validateStep3()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step4" class="stepGroup hidden">
                                            <div class="tabsSteps">
                                                <div class="four-step-tab"><span id="createJobPosterStep1Label_4">Step 1</span></div>
                                                <div class="four-step-tab"><span id="createJobPosterStep2Label_4">Step 2</span></div>
                                                <div class="four-step-tab"><span id="createJobPosterStep3Label_4">Step 3</span></div>
                                                <div class="four-step-tab tab-current"><span id="createJobPosterStep4Label_4">Review</span></div>
                                            </div>
                                            <div class="tabsWrapper">
                                                <div class="tabs">
                                                    <div class="steptab active"> </div>
                                                    <div class="steptab active"> </div>
                                                    <div class="steptab active"> </div>
                                                    <div class="steptab active"> </div>
                                                    <div class="steptab active"> </div>
                                                </div>
                                            </div>
                                            <div class="stepGroupForm">
                                                <div class="formGroup">
                                                    <div class="createJobPosterDemoAreaEnglish" id="createJobPosterDemoAreaEnglish"></div>
                                                    <div class="createJobPosterDemoAreaFrench" id="createJobPosterDemoAreaFrench"></div>
                                                </div>
                                            </div>
                                            <div class="createJobPosterSubmitPane">
                                                <div id="createJobPosterSubmitInstructions" class="formGroup insert">Submit to publish new job poster.</div>
                                                <div class="formGroup">
                                                    <input type="button" id="createJobPoster_goToStep3_2"  value="Go to Step 3" onclick="CreateJobPosterAPI.goToStep('step3')">
                                                    <input id ="createJobPosterSubmitButton" type="submit" value="Submit" onclick="CreateJobPosterAPI.validateStep4()">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="closeButton">
                                <a href="javascript:CreateJobPosterAPI.hideCreateJobPosterForm()" style="padding:5px;display:block;"> </a>
                            </div>
                        </div>-->
            </section>
        </main>
        <?php include '../inc/footer-admin.php'; ?>
    </body>
</html>