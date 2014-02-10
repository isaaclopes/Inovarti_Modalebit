<?php

/**
 *
 * @category   Inovarti
 * @package    Inovarti_Modalebit
 * @author     Suporte <suporte@inovarti.com.br>
 */
class Inovarti_Modalebit_Block_Block extends Mage_Core_Block_Abstract {

    public function __construct() {
        parent::__construct();
        $this->setEnabled(Mage::getStoreConfig('modalebit/modalebit/enabled'));
        $this->setEmpresa(Mage::getStoreConfig('modalebit/modalebit/empresa'));
    }

    protected function _toHtml() {
        $html = "";

        if ($this->getEnabled() && (Mage::getSingleton('customer/session')->isLoggedIn())) {
            $html .= "
               <div class=\"modal fade quickview-modal\" id=\"quick-ebit\">
                   <div class=\"modal-dialog\">
                       <div class=\"modal-content\">
                           <div class=\"modal-header\">
                               <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                               <h4 class=\"modal-title\" id=\"myModalLabel\">".$this->escapeHtml(Mage::getSingleton('customer/session')->getCustomer()->getName())."</h4>
                           </div>
                           <div class=\"modal-body\">" . $this->__('Rate our store in ebit and compete for prizes') . "</div>
                           <div class=\"modal-footer\">
                               <a href=\"https://www.ebitempresa.com.br/bitrate/pesquisa1.asp?empresa=" . $this->getEmpresa() . "\" class=\"btn btn-warning\" target=\"_blank\">" . $this->__('Sure!') . "</a>
                           </div>
                       </div>
                   </div>
               </div>
            ";
            $html .= "<script type=\"text/javascript\">jQuery('#quick-ebit').modal('show');</script>";
        }
        return $html;
    }

}
