<?php

namespace App\Models;

class Conference {
    public $project_id;
    public $project_name;
    public $status;
    public $project_details;
    public $opportunity_id;
    public $started_date;
    public $completed_date;
    public $image_url;
    public $responsible_user_id;
    public $owner_user_id;
    public $date_created_utc;
    public $date_updated_utc;
    public $category_id;
    public $pipeline_id;
    public $stage_id;
    public $visible_to;
    public $visible_team_id;
    public $visible_user_ids;
    public $customfields;
    public $tags;
    public $links;
    public $can_edit;
    public $can_delete;
    public $date;


    public static function fromObject($object) {
        $conference = new Conference();
        $conference->project_id = $object->PROJECT_ID;
        $conference->project_name = implode(', ', array_slice(explode(', ', $object->PROJECT_NAME), 1));
        $conference->status = $object->STATUS;
        $conference->project_details = $object->PROJECT_DETAILS;
        $conference->opportunity_id = $object->OPPORTUNITY_ID;
        $conference->started_date = $object->STARTED_DATE;
        $conference->completed_date = $object->COMPLETED_DATE;
        $conference->image_url = $object->IMAGE_URL;
        $conference->responsible_user_id = $object->RESPONSIBLE_USER_ID;
        $conference->owner_user_id = $object->OWNER_USER_ID;
        $conference->date_created_utc = $object->DATE_CREATED_UTC;
        $conference->date_updated_utc = $object->DATE_UPDATED_UTC;
        $conference->category_id = $object->CATEGORY_ID;
        $conference->pipeline_id = $object->PIPELINE_ID;
        $conference->stage_id = $object->STAGE_ID;
        $conference->visible_to = $object->VISIBLE_TO;
        $conference->visible_team_id = $object->VISIBLE_TEAM_ID;
        $conference->visible_user_ids = $object->VISIBLE_USER_IDS;
        $conference->customfields = $object->CUSTOMFIELDS;
        $conference->tags = $object->TAGS;
        $conference->links = $object->LINKS;
        $conference->can_edit = $object->CAN_EDIT;
        $conference->can_delete = $object->CAN_DELETE;
        $conference->date = current(explode(', ', $object->PROJECT_NAME));

        return $conference;
    }
}
