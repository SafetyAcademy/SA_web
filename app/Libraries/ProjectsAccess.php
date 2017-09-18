<?php namespace App\Libraries;

use Illuminate\Database\Eloquent\Model as Model;

class ProjectsAccess extends Model
{
    protected $table = 'projects_access';
    protected $fillable = ['user_id', 'project_id'];
}
