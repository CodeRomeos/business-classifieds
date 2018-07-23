<?php

namespace App\Repositories;

abstract class Repository
{

	public $model;

	public function __construct($model)
	{
		$this->model = $model;
	}

	public function model()
	{
		return $this->model;
	}

	public function find($id)
	{
		return $this->model->find($id);
	}

	public function findOrFail($id)
	{
		return $this->model->findOrFail($id);
	}

	public function firstOrNew(array $data)
	{
		return $this->model->firstOrNew($data);
	}

	public function firstOrCreate(array $data)
	{
		return $this->model->firstOrCreate($data);
	}

	public function findBySlug($slug)
	{
		return $this->model->where('slug', $slug);
	}

	public function count()
	{
		return $this->model->count();
	}

	public function latest()
	{
		return $this->model->latest();
	}

	public function uploadIfImageInputExist($data)
	{
		if(\Request::hasFile('image'))
		{
			$imageFile = $data['image'];
			unset($data['image']);

			if(isset($data['title'])) {
				$prefix = $data['title'];
			}
			elseif(isset($data['first_name'])) {
				$prefix = $data['first_name'];
			}
			elseif(isset($data['name'])) {
				$prefix = $data['name'];
			}
			else {
				$prefix = '';
			}

			if($this->model instanceof \App\Post)
                $folder = 'posts';
            if($this->model instanceof \App\Business)
				$folder = 'businesses';
			elseif($this->model instanceof \App\User)
				$folder = 'user';
			else
				$folder = null;
			if($image = uploadImage($imageFile, $prefix, $folder))
			{
				$data['image'] = $image;
			}
		}

		return $data;
	}

	public function create($data)
	{
		$data = $this->uploadIfImageInputExist($data);
		return $this->model->create($data);
	}

	public function update($model, $data)
	{
		if(isset($data['remove_image']) && $data['remove_image'] == 1)
		{
			$model = $this->removeImage($model);
		}
		unset($data['remove_image']);

		$data = $this->uploadIfImageInputExist($data);
		$model->fill($data)->save();

		return $model;
	}

	public function onlyTrashed()
    {
        return $this->model->onlyTrashed()->orderBy('deleted_at');
    }

	public function destroy($id)
    {
        return $this->model->destroy($id);
    }

	public function rules($id = null)
	{
		return $this->model->rules($id);
	}

	public function removeImage($object)
	{
		delete_file($object->image);
		$object->image = null;

		return $object;
	}

	public function published()
	{
		return $this->model->published();
    }

    public function search($input)
    {
        $records = $this->model()->latest();

        if(isset($input['title']) && !empty($input['title']))
            $records->where('title', 'LIKE', "%".$input['title']."%");

        if(isset($input['body']) && !empty($input['body']))
            $records->where('body', 'LIKE', "%".$input['body']."%");

        if(isset($input['published_at']) && !empty($input['published_at']))
            $records->where('published_at', '>=', $input['published_at']);

        if(isset($input['status']) && !empty($input['status']) && $input['status'] == 'draft')
            $records->whereNull('published_at');

        if(isset($input['status']) && !empty($input['status']) && $input['status'] == 'publish')
            $records->whereNotNull('published_at');

        if(isset($input['fields']) && is_array($input['fields']))
        {
            foreach($input['fields'] as $field_name => $field_value)
            {
                if(!empty($field_value)) {
                    $records->where($field_name, 'LIKE', "%".$field_value."%");
                }
            }
        }

        if(isset($input['dateFields']) && is_array($input['dateFields']))
        {
            foreach($input['dateFields'] as $field_name => $field_value)
            {
                if(!empty($field_value)) {
                    $records->where($field_name, '>=', $field_value);
                }
            }
        }

        if(isset($input['dateTimeFields']) && is_array($input['dateTimeFields']))
        {
            foreach($input['dateTimeFields'] as $field_name => $field_value)
            {
                if(!empty($field_value)) {
                    $records->where($field_name, $field_value);
                }
            }
        }

        return $records;
    }
}