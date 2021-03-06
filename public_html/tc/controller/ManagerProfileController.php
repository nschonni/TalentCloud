<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/ManagerProfile.php';
require_once '../model/ManagerProfileDetails.php';
require_once '../model/ManagerProfileWithDetails.php';
require_once '../dao/ManagerProfileDAO.php';

class ManagerProfileController{
    
    public static function createManagerProfile(ManagerProfile $managerProfile, ManagerProfileDetails $managerProfileDetails){
        //var_dump("manager profile id = ".$managerProfile->getUser_manager_profile_id());
        if($managerProfile->getUser_manager_profile_id() != null){
           $response = ManagerProfileDAO::updateManagerProfile($managerProfile, $managerProfileDetails);
        }else{
            $response = ManagerProfileDAO::createManagerProfile($managerProfile, $managerProfileDetails);
        }
        return $response;
        
    }
    
    public static function getManagerProfile($managerProfile){
        
        $response = ManagerProfileDAO::getManagerProfile($managerProfile);
        
        return $response;
        
    }
    
    public static function getManagerProfileDetails($managerProfile){
        
        $response = ManagerProfileDAO::getManagerProfileDetails($managerProfile);
        
        return $response;
        
    }
    
    public static function getManagerProfileWithDetails($managerProfile){
        
        $profile = ManagerProfileController::getManagerProfile($managerProfile);
        
        $details = ManagerProfileController::getManagerProfileDetails($profile);
        
        $managerProfileWithDetails = new ManagerProfileWithDetails($profile,$details);
        
        $response = $managerProfileWithDetails;
        
        return $response;
        
    }
}
?>