<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class JobPosterNonLocalized implements JsonSerializable {

    private $id;
    private $title_en;
    private $title_fr;
    private $department_id;
    private $province_id;
    private $city_en;
    private $city_fr;
    private $term_qty;
    private $term_units_id;
    private $open_date;
    private $close_date;
    private $start_date;
    private $remuneration_range_low;
    private $remuneration_range_high;
    private $job_min_level_id;
    private $job_max_level_id;
    private $impact_en;
    private $impact_fr;
    private $key_tasks_en;
    private $key_tasks_fr;
    private $core_competencies_en;
    private $core_competencies_fr;
    private $developing_competencies_en;
    private $developing_competencies_fr;
    private $other_requirements_en;
    private $other_requirements_fr;
    
    public function __construct(
            $id=null, 
            $title_en=null, 
            $title_fr=null, 
            $department_id=null, 
            $province_id=null, 
            $city_en=null, 
            $city_fr=null, 
            $term_qty=null, 
            $term_units_id=null, 
            $open_date=null, 
            $close_date=null, 
            $start_date=null,
            $remuneration_range_low=null, 
            $remuneration_range_high=null, 
            $job_min_level_id=null, 
            $job_max_level_id=null, 
            $impact_en=null, 
            $impact_fr=null,
            $key_tasks_en=null,
            $key_tasks_fr=null,
            $core_competencies_en=null,
            $core_competencies_fr=null,
            $developing_competencies_en=null,
            $developing_competencies_fr=null,
            $other_requirements_en=null,
            $other_requirements_fr=null) {
        $this->id = $id;
        $this->title_en = $title_en;
        $this->title_fr = $title_fr;
        $this->department_id = $department_id;
        $this->province_id = $province_id;
        $this->city_en = $city_en;
        $this->city_fr = $city_fr;
        $this->term_qty = $term_qty;
        $this->term_units_id = $term_units_id;
        $this->open_date = $open_date;
        $this->close_date = $close_date;
        $this->start_date = $start_date;
        $this->remuneration_range_low = $remuneration_range_low;
        $this->remuneration_range_high = $remuneration_range_high;
        $this->job_min_level_id = $job_min_level_id;
        $this->job_max_level_id = $job_max_level_id;
        $this->impact_en = $impact_en;
        $this->impact_fr = $impact_fr;
        $this->key_tasks_en = $key_tasks_en;
        $this->key_tasks_fr = $key_tasks_fr;
        $this->core_competencies_en = $core_competencies_en;
        $this->core_competencies_fr = $core_competencies_fr;
        $this->developing_competencies_en = $developing_competencies_en;
        $this->developing_competencies_fr = $developing_competencies_fr;
        $this->other_requirements_en = $other_requirements_en;
        $this->other_requirements_fr = $other_requirements_fr;
    }

    
    public function jsonSerialize() {
        $getter_names = get_class_methods(get_class($this));
        $gettable_attributes = array();
        foreach ($getter_names as $key => $value) {
            if(substr($value, 0, 3) === 'get') {
                $gettable_attributes[strtolower(substr($value, 3, strlen($value)))] = $this->$value();
            }
        }
        return $gettable_attributes;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getTitle_en() {
        return $this->title_en;
    }

    public function getTitle_fr() {
        return $this->title_fr;
    }

    public function getDepartment_id() {
        return $this->department_id;
    }

    public function getProvince_id() {
        return $this->province_id;
    }

    public function getCity_en() {
        return $this->city_en;
    }

    public function getCity_fr() {
        return $this->city_fr;
    }

    public function getTerm_qty() {
        return $this->term_qty;
    }

    public function getTerm_units_id() {
        return $this->term_units_id;
    }

    public function getOpen_date() {
        return $this->open_date;
    }

    public function getClose_date() {
        return $this->close_date;
    }

    public function getStart_date() {
        return $this->start_date;
    }

    public function getRemuneration_range_low() {
        return $this->remuneration_range_low;
    }

    public function getRemuneration_range_high() {
        return $this->remuneration_range_high;
    }

    public function getJob_min_level_id() {
        return $this->job_min_level_id;
    }

    public function getJob_max_level_id() {
        return $this->job_max_level_id;
    }

    public function getImpact_en() {
        return $this->impact_en;
    }

    public function getImpact_fr() {
        return $this->impact_fr;
    }

    public function getKey_tasks_en() {
        return $this->key_tasks_en;
    }

    public function getKey_tasks_fr() {
        return $this->key_tasks_fr;
    }

    public function getCore_competencies_en() {
        return $this->core_competencies_en;
    }

    public function getCore_competencies_fr() {
        return $this->core_competencies_fr;
    }

    public function getDeveloping_competencies_en() {
        return $this->developing_competencies_en;
    }

    public function getDeveloping_competencies_fr() {
        return $this->developing_competencies_fr;
    }

    public function getOther_requirements_en() {
        return $this->other_requirements_en;
    }

    public function getOther_requirements_fr() {
        return $this->other_requirements_fr;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle_en($title_en) {
        $this->title_en = $title_en;
        return $this;
    }

    public function setTitle_fr($title_fr) {
        $this->title_fr = $title_fr;
        return $this;
    }

    public function setDepartment_id($department_id) {
        $this->department_id = $department_id;
        return $this;
    }

    public function setProvince_id($province_id) {
        $this->province_id = $province_id;
        return $this;
    }

    public function setCity_en($city_en) {
        $this->city_en = $city_en;
        return $this;
    }

    public function setCity_fr($city_fr) {
        $this->city_fr = $city_fr;
        return $this;
    }

    public function setTerm_qty($term_qty) {
        $this->term_qty = $term_qty;
        return $this;
    }

    public function setTerm_units_id($term_units_id) {
        $this->term_units_id = $term_units_id;
        return $this;
    }

    public function setOpen_date($open_date) {
        $this->open_date = $open_date;
        return $this;
    }

    public function setClose_date($close_date) {
        $this->close_date = $close_date;
        return $this;
    }

    public function setStart_date($start_date) {
        $this->start_date = $start_date;
        return $this;
    }

    public function setRemuneration_range_low($remuneration_range_low) {
        $this->remuneration_range_low = $remuneration_range_low;
        return $this;
    }

    public function setRemuneration_range_high($remuneration_range_high) {
        $this->remuneration_range_high = $remuneration_range_high;
        return $this;
    }

    public function setJob_min_level_id($job_min_level_id) {
        $this->job_min_level_id = $job_min_level_id;
        return $this;
    }

    public function setJob_max_level_id($job_max_level_id) {
        $this->job_max_level_id = $job_max_level_id;
        return $this;
    }

    public function setImpact_en($impact_en) {
        $this->impact_en = $impact_en;
        return $this;
    }

    public function setImpact_fr($impact_fr) {
        $this->impact_fr = $impact_fr;
        return $this;
    }

    public function setKey_tasks_en($key_tasks_en) {
        $this->key_tasks_en = $key_tasks_en;
        return $this;
    }

    public function setKey_tasks_fr($key_tasks_fr) {
        $this->key_tasks_fr = $key_tasks_fr;
        return $this;
    }

    public function setCore_competencies_en($core_competencies_en) {
        $this->core_competencies_en = $core_competencies_en;
        return $this;
    }

    public function setCore_competencies_fr($core_competencies_fr) {
        $this->core_competencies_fr = $core_competencies_fr;
        return $this;
    }

    public function setDeveloping_competencies_en($developing_competencies_en) {
        $this->developing_competencies_en = $developing_competencies_en;
        return $this;
    }

    public function setDeveloping_competencies_fr($developing_competencies_fr) {
        $this->developing_competencies_fr = $developing_competencies_fr;
        return $this;
    }

    public function setOther_requirements_en($other_requirements_en) {
        $this->other_requirements_en = $other_requirements_en;
        return $this;
    }

    public function setOther_requirements_fr($other_requirements_fr) {
        $this->other_requirements_fr = $other_requirements_fr;
        return $this;
    }
}