<?php

namespace App\Filters;

use App\Models\AdministratorModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuthFilter implements FilterInterface
{

    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param \CodeIgniter\HTTP\RequestInterface $request
     *
     * @return mixed
     */
    public function before(RequestInterface $request)
    {
        list($moduleName, $controllerName, $actionName) = array_pad($request->uri->getSegments(),
            3, null);
        if ($moduleName === ADMIN_PATH && (!$actionName || $actionName !== 'login') && $actionName !== 'initialize') {
            $identity = AdministratorModel::findIdentity();
            if (!$identity) {
                // Redirect to login page
                return redirect('admin_login');
            }
        }
        if ($moduleName === SEEKER_PATH) {
            $session = session();
            if ($session->get(SESSION_USER_TYPE_KEY) != 'seeker' && !$session->get(SESSION_USER_ID_KEY)) {
                // Redirect to login page
                return redirect('login_seeker');
            }
        }
        return true;
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param \CodeIgniter\HTTP\RequestInterface $request
     * @param \CodeIgniter\HTTP\ResponseInterface $response
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // TODO: Implement after() method.
    }
}