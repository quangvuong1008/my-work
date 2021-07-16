<?php

namespace App\Models;

use App\Helpers\StringHelper;
use App\Models\Interfaces\ContentInterface;
use App\Models\Interfaces\ImageAssetInterface;
use App\Models\Interfaces\UrlInterface;

/**
 * Class ContentCategoryModel
 * @package App\Models
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string $intro
 * @property int $is_lock
 * @property int $created_at
 * @property int $updated_at
 *
 * @property int $level
 * @property CategoryModel[] $children
 */
class JobModel extends BaseModel implements  UrlInterface
{
    protected $table = 'job';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['title', 'slug', 'is_lock', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'int';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $beforeInsert = ['updateSlug', 'authorLog'];
    protected $beforeUpdate = ['updateSlug', 'authorLog'];

//    protected $frontendRouter = 'Job::detail';
//    protected $afterInsert = ['instanceUrl'];
//    protected $afterUpdate = ['instanceUrl'];
//    protected $afterDelete = ['removeUrl'];


    /**
     * @param array $data
     * @return array
     */
    public function updateSlug(array $data): array
    {
        if (!isset($data['data']['slug']) || empty($data['data']['slug'])) {
            // Create 'slug' if not exists
            $data['data']['slug'] = $data['data']['title'];
        }
        $data['data']['slug'] = StringHelper::rewrite($data['data']['slug']);
        return $data;
    }

    /**
     * @param string|null $scenario
     * @return array
     */
    public function getRules(string $scenario = null): array
    {
        return [
            'title' => 'required|min_length[3]|max_length[255]'
        ];
    }

    public function getUrl(): string
    {
        return base_url('/tuyen-dung?job_ids=' . $this->id);
    }
}