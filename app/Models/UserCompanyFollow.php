<?php

namespace App\Models;

use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\StringHelper;

use App\Models\Interfaces\IdentityInterface;
use App\Models\UserRecruitmentModel;

/**
 * Class AdministratorModel
 * @package App\Models
 *
 * @property int $id
 * @property string $account_name
 * @property string $password_hash
 * @property string $full_name
 * @property string $avt
 * @property int $type
 * @property int $is_lock
 *
 * @property int $login_after_init
 */

class UserCompanyFollow extends BaseModel
{
    protected $table = 'user_company_follow';
    protected $primaryKey = 'id';


    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'user_id', 'user_rcm_id',  'created_at', 'updated_at'

    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';

    protected $dateFormat = 'int';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function get_company_follow()
    {
        $model_company = (new UserRecruitmentModel())->find($this->user_rcm_id);

        return $model_company;
    }




    public function getRules(string $scenario = null): array
    {
        return [];
    }


}
