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
class FieldsOfOperationModel extends BaseModel
{
    protected $table = 'fields_of_operation';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['title', 'parent_id', 'is_lock', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'int';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    protected $beforeInsert = ['authorLog'];
    protected $beforeUpdate = ['authorLog'];

    private $_query = [];

    /**
     * @param int|null $page
     * @return string
     */

    private static $_cached;

    /**
     * @param array $query
     * @return CategoryModel[]
     */
    public static function getItems(array $query = [])
    {
        if (!static::$_cached) {
            $model = new static();

            if (!empty($query)) {
                foreach ($query as $method => $value) {
                    list($attr, $cond) = $value;
                    $model->$method($attr, $cond);
                }
            }
            static::$_cached = $model->findAll();
        }
        return static::$_cached;
    }

    /**
     * @param string $key
     * @param array $value
     * @return $this
     */
    public function addQuery(string $key, array $value = [])
    {
        $this->_query[$key] = $value;
        return $this;
    }

    public function get_items_of_cate(array $query = [])
    {
        if (!empty($query)) {
            foreach ($query as $method => $value) {
                list($attr, $cond) = $value;
                $this->$method($attr, $cond);
            }
        }
        return $this->findAll();
    }

    /**
     * @param int $parentId
     * @param int $level
     * @param int|null $maxLevel
     * @return array
     */
    public function getFieldsRecursive($parentId = 0, $level = 0, int $maxLevel = null): array
    {
        $items = self::getItems($this->_query);
        if (!$items) return [];

        $result = [];
        foreach ($items as $item) {
            if ($item->parent_id == $parentId) {
                $item->level = $level;
                $children = (!$maxLevel || $level < $maxLevel) ?
                    $this->getFieldsRecursive((int)$item->id, $level + 1, $maxLevel) : null;
                if ($children && !empty($children)) {
                    $item->children = $children;
                }
                $result[] = $item;
            }
        }

        return $result;
    }
    /* menu_order */
    public function getCategoryRecursive_menu($parentId = 0, $level = 0, int $maxLevel = null): array
    {
        $items = $this->get_items_of_cate($this->_query);
        if (!$items) return [];

        $result = [];
        foreach ($items as $item) {
            if ($item->parent_id == $parentId) {
                $item->level = $level;
                $children = (!$maxLevel || $level < $maxLevel) ?
                    $this->getCategoryRecursive_menu((int)$item->id, $level + 1, $maxLevel) : null;
                if ($children && !empty($children)) {
                    $item->children = $children;
                }
                $result[] = $item;
            }
        }

        return $result;
    }

    /**
     * @param array $result
     * @param int $parentId
     * @param int $level
     * @return array
     */
    public function getOperationOptions(array &$result = [], int $parentId = 0, $level = 0): array
    {
        $items = self::getItems($this->_query);
        if (!$items) return [];

        if ($level === 0) {
            $result = [0 => 'DANH MỤC GỐC'];
        }
        foreach ($items as $item) {
            if ($item->parent_id == $parentId) {
                $result[$item->id] = str_repeat('-- ', $level + 1) . $item->title;
                $children = $this->getOperationOptions($result, $item->id, $level + 1);
                if (!empty($children)) {
                    $result = $children;
                }
            }
        }

        return $result;
    }


    public function getRules(string $scenario = null): array
    {
        return [
            'title' => 'required|min_length[3]|max_length[255]',
            'parent_id' => 'integer'
        ];
    }

}