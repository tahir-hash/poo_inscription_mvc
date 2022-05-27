<?php

namespace App\Core;
use App\Core\Request;
use App\Model\Etudiant;
use Digia\InstanceFactory\InstanceFactory;

class Controller{
    protected string $layout="base";
    protected Request $request;
    protected Session $session;
    public function __construct(Request $request){

        $this->request = $request;
        $this->session=new Session;
    }
    
    public function instance(string $classe, array $data)
    {
        return $instanced= InstanceFactory::fromProperties($classe,$data);
    }
    
    public function render(string $path, array $data=[]){
        $data["Constantes"]=Constantes::class;
        $data["Role"]=Role::class;
        $data["Session"]=Session::class;
        $data["request"]=$this->request;
        ob_start();
        extract($data);
        require_once(Constantes::ROOT()."templates/".$path);
        $contents_for_views=ob_get_clean();
        require_once(Constantes::ROOT()."templates/layout/".$this->layout.".html.php");
    }
    
    public function redirectToRoute($uri){
        header("location:".Constantes::WEB_ROOT.$uri);
        exit();
    }
    public function paginate(string $class,array $findAll,int $perpage,string $findTest):array
    {
        $currentPage=(int)($_GET['page'] ?? 1);
        $count= count($findAll);
        $pages=ceil($count / $perpage);
        if($currentPage>$pages || $currentPage<=0)
        {
            $currentPage=1;
        }
        $offset=$perpage * ($currentPage-1);
        $profs = $class::$findTest($offset);
        $pagination=[
            "profs"=>$profs,
            "pages"=>$pages,
            "currentPage"=>$currentPage
        ];
        return $pagination;
    }
}