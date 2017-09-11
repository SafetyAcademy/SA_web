<?php

namespace App\Models;

class Conference extends APIModel {
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

    public static function fromObject($object) {
        $conference = new Conference();
        $conference->deserialize($object, [
            'PROJECT_ID' => 'project_id',
            'PROJECT_NAME' => array(
                'field' => 'project_name',
                'value' => function() use ($object) {
                    return implode(', ', array_slice(explode(', ', $object->PROJECT_NAME), 1));
                },
            ),
            'STATUS' => 'status',
            'PROJECT_DETAILS' => 'project_details',
            'OPPORTUNITY_ID' => 'opportunity_id',
            'STARTED_DATE' => 'started_date',
            'COMPLETED_DATE' => 'completed_date',
            'IMAGE_URL' => 'image_url',
            'RESPONSIBLE_USER_ID' => 'responsible_user_id',
            'OWNER_USER_ID' => 'owner_user_id',
            'DATE_CREATED_UTC' => 'date_created_utc',
            'DATE_UPDATED_UTC' => 'date_updated_utc',
            'CATEGORY_ID' => 'category_id',
            'PIPELINE_ID' => 'pipeline_id',
            'STAGE_ID' => 'stage_id',
            'VISIBLE_TO' => 'visible_to',
            'VISIBLE_TEAM_ID' => 'visible_team_id',
            'VISIBLE_USER_IDS' => 'visible_user_ids',
            'CUSTOMFIELDS' => 'customfields',
            'TAGS' => 'tags',
            'LINKS' => 'links',
            'CAN_EDIT' => 'can_edit',
            'CAN_DELETE' => 'can_delete',
            'DATE' => array(
                'field' => 'date',
                'default' => function () use ($object) {
                    return current(explode(', ', $object->PROJECT_NAME));
                },
            ),
        ]);
        return $conference;
    }
}
