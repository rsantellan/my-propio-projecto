<?php

/*
 */

/**
 * Description of processMdUserProfileAjaxAction
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class processMdUserProfileAjaxAction extends sfAction{
  
  public function execute($request)
  {
    $salida = array();
    $mdUserProfileValues = $request->getPostParameter('md_user_profile');
    $mdUserProfile = Doctrine::getTable('mdUserProfile')->find($mdUserProfileValues ['id']);
    if (isset($mdUserProfileValues['mdAttributes'])) {
        $mdUserProfile->setEmbedProfile(true);
    }
    $form = new mdUserProfileAdminForm($mdUserProfile);

    $form->bind($this->request->getParameter($form->getName()), $this->request->getFiles($form->getName()));
    if ($form->isValid()) {
        $form->save();
        $obj = $form->getObject();
        $body = $this->getPartial('perfil/user_profile_data', array('profile'=> $obj));
        return $this->renderText(mdBasicFunction::basic_json_response(true, array('body' => $body, "mduserid"=>$form->getObject()->getId())));
    } else {
        $body = $this->getPartial('mdUserManagementFrontend/md_user_profile_form', array('form' => $form));
        return $this->renderText(mdBasicFunction::basic_json_response(false, array("body"=>$body)));
    }
  }
}


