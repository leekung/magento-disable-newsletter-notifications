<?php
/**
 * @author Aurélien Millet
 * @link https://github.com/aurmil/magento-disable-newsletter-notifications
 * @license https://github.com/aurmil/magento-disable-newsletter-notifications/blob/master/LICENSE.md
 */
if (Mage::helper('core')->isModuleEnabled('AW_Followupemail') && class_exists('AW_Followupemail_Model_Subscriber')) {
    class Aurmil_DisableNewsletterNotifications_Model_Subscriber_Wrapper extends AW_Followupemail_Model_Subscriber {}
} else {
    class Aurmil_DisableNewsletterNotifications_Model_Subscriber_Wrapper extends Mage_Newsletter_Model_Subscriber {}
}
class Aurmil_DisableNewsletterNotifications_Model_Subscriber extends Aurmil_DisableNewsletterNotifications_Model_Subscriber_Wrapper
{
    public function sendConfirmationRequestEmail()
    {
        if (Mage::getStoreConfigFlag('newsletter/subscription/success_email_send')) {
            return parent::sendConfirmationRequestEmail();
        }

        return $this;
    }

    public function sendConfirmationSuccessEmail()
    {
        if (Mage::getStoreConfigFlag('newsletter/subscription/success_email_send')) {
            return parent::sendConfirmationSuccessEmail();
        }

        return $this;
    }

    public function sendUnsubscriptionEmail()
    {
        if (Mage::getStoreConfigFlag('newsletter/subscription/un_email_send')) {
            return parent::sendUnsubscriptionEmail();
        }

        return $this;
    }
}
