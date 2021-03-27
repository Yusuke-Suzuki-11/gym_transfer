<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
	use HasFactory;

	private function getLevelRow()
	{
		return $this->hasOne('App\Models\ClassLevel', 'id')->first();
	}

	public function getLevel()
	{
		return $this->getLevelRow()->name;
	}

	public function getRowsetForStudentAdd()
	{
		$data = [];
		foreach ($this->all() as $Row) {
			$subData = [];
			$subData['id'] = $Row->id;
			$subData['name'] = $Row->name;
			$subData['level'] = $Row->getLevel();
			$data[] = $subData;
		}
		return $data;
	}
}
