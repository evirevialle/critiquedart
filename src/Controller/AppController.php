<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
    public function beforeRender ($event){
                // Get the format, that is to be rendered, from the query params
                $format = $this->request->getQuery('export');
                if(empty($format)) return;
        
                $format = strtolower($format);
        
                $formats = [
                    'xml' => 'Xml',
                    'json' => 'Json'
                ];
        
                // Define file name for download file according to the current Controller
                if(isset($formats[$format])){
                    $filename = 'Critiquesdart_';
                    $viewVars = $this->viewBuilder()->getVars();
        
                    if ($this->request->getParam('action') === 'view') {
                        switch($this->name){
                            case 'Critiques':
                                $filename .= 'C-'.$viewVars['critiquedart']->id;
                            break;
                            case 'Data':
                                $filename .= 'D-'.$viewVars['data']->id;
                        }
                    } else {
                        $filename .= 'overview';
                    }
        
                    $filename .= '.'.$format;
        
                    // Set the options for the view
                    $this->viewBuilder()->setClassName($formats[$format]);
                    $this->viewBuilder()->setOption('serialize', true);
                    $this->viewBuilder()->setOption('rootNode', 'results');
        
                    // Set content-disposition header to force download instead of rendering a view
                    $this->response = $this->response
                        ->withCharset('UTF-8')
                        ->withHeader('Content-Disposition', 'attachment; filename="'.$filename.'"');
                }
    }
}
