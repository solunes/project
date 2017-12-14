<?php
namespace Solunes\Project;

use Illuminate\Support\Facades\Facade;

class ProjectFacade extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'project';
	}
}