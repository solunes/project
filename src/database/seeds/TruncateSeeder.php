<?php

namespace Solunes\Project\Database\Seeds;

use Illuminate\Database\Seeder;
use DB;

class TruncateSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Solunes\Project\App\Wiki::truncate();
        \Solunes\Project\App\WikiType::truncate();
        \Solunes\Project\App\ProjectIssueUpdate::truncate();
        \Solunes\Project\App\ProjectIssue::truncate();
        \Solunes\Project\App\ProjectTaskUpdate::truncate();
    	\Solunes\Project\App\ProjectTask::truncate();
        \Solunes\Project\App\Project::truncate();
        \Solunes\Project\App\DefaultTaskHowto::truncate();
        \Solunes\Project\App\DefaultTask::truncate();
        \Solunes\Project\App\DutyUser::truncate();
        \Solunes\Project\App\Duty::truncate();
        \Solunes\Project\App\ProjectType::truncate();
        \Solunes\Project\App\TaskAlert::truncate();
        \Solunes\Project\App\Task::truncate();

    }
}