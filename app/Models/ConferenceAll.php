<?php

namespace App\Models;

class ConferenceAll {
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
        $conferenceAll = new ConferenceAll();
        $conferenceAll->project_id = $object->PROJECT_ID;
        $conferenceAll->project_name = implode(', ', array_slice(explode(', ', $object->PROJECT_NAME), 1));
        $conferenceAll->status = $object->STATUS;
        $conferenceAll->project_details = $object->PROJECT_DETAILS;
        $conferenceAll->opportunity_id = $object->OPPORTUNITY_ID;
        $conferenceAll->started_date = $object->STARTED_DATE;
        $conferenceAll->completed_date = $object->COMPLETED_DATE;
        $conferenceAll->image_url = $object->IMAGE_URL;
        $conferenceAll->responsible_user_id = $object->RESPONSIBLE_USER_ID;
        $conferenceAll->owner_user_id = $object->OWNER_USER_ID;
        $conferenceAll->date_created_utc = $object->DATE_CREATED_UTC;
        $conferenceAll->date_updated_utc = $object->DATE_UPDATED_UTC;
        $conferenceAll->category_id = $object->CATEGORY_ID;
        $conferenceAll->pipeline_id = $object->PIPELINE_ID;
        $conferenceAll->stage_id = $object->STAGE_ID;
        $conferenceAll->visible_to = $object->VISIBLE_TO;
        $conferenceAll->visible_team_id = $object->VISIBLE_TEAM_ID;
        $conferenceAll->visible_user_ids = $object->VISIBLE_USER_IDS;
        $conferenceAll->customfields = $object->CUSTOMFIELDS;
        $conferenceAll->tags = $object->TAGS;
        $conferenceAll->links = $object->LINKS;
        $conferenceAll->can_edit = $object->CAN_EDIT;
        $conferenceAll->can_delete = $object->CAN_DELETE;
        $conferenceAll->date = current(explode(', ', $object->PROJECT_NAME));

        return $conferenceAll;
    }
}
