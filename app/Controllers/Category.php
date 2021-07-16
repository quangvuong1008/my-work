<?php

namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\VotesModel;
use CodeIgniter\Session\Session;

class Category extends BaseController
{
    public function index(int $id)
    {
        /** @var CategoryModel $model */
        $vote  =(new VotesModel())->get_avg_vote_rate_of_category($id);
        $model = (new CategoryModel())->where('is_lock', 0)->find($id);

        if (!$model) {
            return $this->renderError();
        }

        /** @var CategoryModel $children */
        $children = (new CategoryModel())
            ->where('parent_id', $model->getPrimaryKey())
            ->where('is_lock', 0);

        return $this->render('index', [
            'vote'=> $vote,
            'model' => $model,
            'models' => $children->paginate(10),
            'pager' => $children->pager,
            'meta_image_url'=> $model->getImage()
        ]);
    }

    public function ajaxCategoryTop(int $id)
    {
        $this->layout = null;

        $model = (new CategoryModel())->where('is_lock', 0)->find($id);

        if (!$model) {
            return null;
        }

        /** @var CategoryModel $children */
        $children = (new CategoryModel())
            ->where('parent_id', $model->getPrimaryKey())
            ->where('is_lock', 0)
            ->findAll(6);


        return $this->render('category/ajax-category-top', [
            'models' => $children
        ]);
    }
    public function insert_votes_rate_category(){
        $data = $this->request->getPost();
        $object_id = $data['object_id'];
        $guest_id = (new \DateTime())->format('Y-m-d H:i:s');
        $vote_rate = $data['vote_rate'];
        $ip_address = $this->request->getIPAddress();



        $key = 'vote_category' . $object_id;
        $session = session();

        $exits_session = $session->get($key);
        if($exits_session) {
            echo json_encode(0);
            die;
        }

        $session->set($key,1);

        $votes_rate = (new VotesModel())->insert_vote_rate($object_id,$guest_id,$vote_rate,$ip_address);
        echo json_encode(1);

    }
}