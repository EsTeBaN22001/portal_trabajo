<?php

namespace Controllers;

use Model\ActiveRecord;
use Model\Skills;
use MVC\Router;

class DashboardController {

	public static function dashboard(Router $router) {

		// $query = "SELECT jobs.id, jobs.title, jobs.description, jobs.salary, business.name AS business, jobs.date FROM jobs INNER JOIN business ON jobs.id_business = business.id ORDER BY jobs.id DESC";

		$query = "SELECT
        jobs.id,
        jobs.title,
        jobs.description,
        jobs.salary,
        business.name AS business,
        jobs.date,
        GROUP_CONCAT(skills.title) AS skills
      FROM
        jobs
      INNER JOIN
        business ON jobs.id_business = business.id
      INNER JOIN
        skills_job ON jobs.id = skills_job.id_job
      INNER JOIN
        skills ON skills_job.id_skill = skills.id
      GROUP BY
        jobs.id,
        jobs.title,
        jobs.description,
        jobs.salary,
        business.name,
        jobs.date
      ORDER BY
        jobs.id DESC
    ";

		$jobs = ActiveRecord::consultSQL($query);

		// Convertir el string de las skills en un array para iterarlo en la vista
		foreach ($jobs as $job) {
			$job->skills = explode(',', $job->skills);
		}

		$router->render('dashboard/index', [
			'title' => 'Dashboard',
			'jobs' => $jobs,
		]);

	}

	public static function jobByCategory(Router $router) {

		// Obtener la skill por get
		$skillName = $_GET['skill'] ?? null;

		if ($skillName === '' || $skillName === null) {
			redirect('/dashboard');
		}

		$skill = Skills::where('title', $skillName);

		if ($skill === null) {
			redirect('/dashboard');
		}

		$query = "SELECT
        jobs.id,
        jobs.title,
        jobs.description,
        jobs.salary,
        business.name AS business,
        jobs.date,
        GROUP_CONCAT(skills.title) AS all_skills
      FROM
        jobs
      INNER JOIN
        business ON jobs.id_business = business.id
      INNER JOIN
        skills_job ON jobs.id = skills_job.id_job
      INNER JOIN
        skills ON skills_job.id_skill = skills.id
      WHERE
        jobs.id IN (
          SELECT id_job
          FROM skills_job
          WHERE id_skill = " . $skill->id . "
        )
      GROUP BY
        jobs.id,
        jobs.title,
        jobs.description,
        jobs.salary,
        business.name,
        jobs.date
      ORDER BY
        jobs.id DESC
    ";

		// Obtener el ID de la skill de la URL (GET)
		$skillId = isset($_GET['id']) ? intval($_GET['id']) : 0;

		$jobs = ActiveRecord::consultSQL($query, [$skillId]);

		// Convertir el string de todas las skills en un array para iterarlo en la vista
		foreach ($jobs as $job) {
			$job->all_skills = explode(',', $job->all_skills);
		}

		$router->render('dashboard/jobByCategory', [
			'title' => 'Dashboard',
			'jobs' => $jobs,
		]);

	}

}

?>