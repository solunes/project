<?php

namespace Solunes\Project\Database\Seeds;

use Illuminate\Database\Seeder;
use DB;

class MasterSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Módulo General de Empresa ERP
        $node_task = \Solunes\Master\App\Node::create(['name'=>'task', 'location'=>'project', 'folder'=>'project']);
        $node_task_alert = \Solunes\Master\App\Node::create(['name'=>'task-alert', 'location'=>'project', 'folder'=>'project']);
        $node_project_type = \Solunes\Master\App\Node::create(['name'=>'project-type', 'location'=>'project', 'folder'=>'project']);
        $node_duty = \Solunes\Master\App\Node::create(['name'=>'duty', 'table_name'=>'duties', 'location'=>'project', 'folder'=>'project']);
        $node_duty_user = \Solunes\Master\App\Node::create(['name'=>'duty-user', 'location'=>'project', 'folder'=>'project']);
        $node_default_task = \Solunes\Master\App\Node::create(['name'=>'default-task', 'location'=>'project', 'folder'=>'project']);
        $node_default_task_howtos = \Solunes\Master\App\Node::create(['name'=>'default-task-howto', 'location'=>'project', 'folder'=>'project']);
        $node_project = \Solunes\Master\App\Node::create(['name'=>'project', 'location'=>'project', 'folder'=>'project']);
        $node_project_task = \Solunes\Master\App\Node::create(['name'=>'project-task', 'location'=>'project', 'folder'=>'project']);
        $node_project_task_update = \Solunes\Master\App\Node::create(['name'=>'project-task-update', 'location'=>'project', 'folder'=>'project']);
        $node_project_issue = \Solunes\Master\App\Node::create(['name'=>'project-issue', 'location'=>'project', 'folder'=>'project']);
        $node_project_issue_update = \Solunes\Master\App\Node::create(['name'=>'project-issue-update', 'location'=>'project', 'folder'=>'project']);
        $node_wiki_type = \Solunes\Master\App\Node::create(['name'=>'wiki-type', 'location'=>'project', 'folder'=>'project']);
        $node_wiki = \Solunes\Master\App\Node::create(['name'=>'wiki', 'location'=>'project', 'folder'=>'project']);

        // Usuarios
        $admin = \Solunes\Master\App\Role::where('name', 'admin')->first();
        $member = \Solunes\Master\App\Role::where('name', 'member')->first();
        $project_perm = \Solunes\Master\App\Permission::create(['name'=>'project', 'display_name'=>'Proyectos']);
        $admin->permission_role()->attach([$project_perm->id]);

    }
}