<?php

namespace App\Controllers;


use App\Models\NewsModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductModel;

class Product extends BaseController
{
    /**
     * @param int $id
     * @return string
     */
    public function index(int $id)
    {
        $model = $this->findCategory($id);

        if (!$model) {
            return $this->renderError();
        }

        $products = (new ProductModel())
            ->where('category_id', $model->getPrimaryKey())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC');

        return $this->render('index', [
            'model' => $model,
            'products' => $products->paginate(),
            'pager' => $products->pager
        ]);
    }

    /**
     * @return string
     */
    public function category()
    {
        $categories = (new ProductCategoryModel())->where('is_lock', 0)->findAll();

        $products = (new ProductModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll(12);

        return $this->render('product/category', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    /**
     * @param int $id
     * @return string
     */
    public function detail(int $id)
    {
        /** @var ProductModel $model */
        $model = (new ProductModel())->where('is_lock', 0)->find($id);

        /** @var ProductCategoryModel $category */
        if (!$model || !($category = $this->findCategory($model->category_id))) {
            return $this->renderError();
        }

        $products = (new ProductModel())
            ->where('is_lock', 0)
            ->where('category_id', $category->getPrimaryKey())
            ->whereNotIn('id', [$model->getPrimaryKey()])
            ->limit(8)
            ->orderBy('updated_at', 'DESC')
            ->findAll();

        return $this->render('detail', [
            'category' => $category,
            'model' => $model,
            'products' => $products
        ]);
    }

    /**
     * @param int $id
     * @return array|null|ProductCategoryModel
     */
    protected function findCategory(int $id)
    {
        return (new ProductCategoryModel())->where('is_lock', 0)->find($id);
    }
}