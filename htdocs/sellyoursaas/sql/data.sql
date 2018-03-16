
-- Insert payment modes
INSERT INTO llx_c_paiement (id,code,libelle,type,active,accountancy_code,module) VALUES (100,'STRIPE','Stripe',2,1,null,null);
INSERT INTO llx_c_paiement (id,code,libelle,type,active,accountancy_code,module) VALUES (101,'PAYPAL','Paypal',2,1,null,null);


-- Insert package/products
--DELETE FROM llx_product where rowid >= 100;
INSERT INTO llx_product (rowid,fk_product_type,ref,label,price,tosell,tobuy, duration) VALUES (100, 1, 'DOLICLOUD-PACK-DOL',     'Instance Dolibarr ERP & CRM',   0, 1, 1, '1m');
INSERT INTO llx_product (rowid,fk_product_type,ref,label,price,tosell,tobuy, duration) VALUES (101, 1, 'DOLICLOUD-PACK-MED',     'Instance DoliMed',              0, 1, 1, '1m');
INSERT INTO llx_product (rowid,fk_product_type,ref,label,price,tosell,tobuy, duration) VALUES (130, 1, 'DOLICLOUD-OPT-Go',       'Option Gb over 5Gb',            1, 1, 1, '1m');
INSERT INTO llx_product (rowid,fk_product_type,ref,label,price,tosell,tobuy, duration) VALUES (151, 1, 'DOLICLOUD-MOD-DoliMed',  'Module DoliMed',                0, 1, 1, '1m');
INSERT INTO llx_product (rowid,fk_product_type,ref,label,price,tosell,tobuy, duration) VALUES (152, 1, 'DOLICLOUD-MOD-Google',   'Module Google',                 8, 1, 1, '1m');
-- ...



-- Plans may be Variant of package/products



-- Insert emails templates
--DELETE FROM llx_c_email_templates where rowid >= 100 and rowid <= 109;
INSERT INTO llx_c_email_templates (rowid,module,type_template,label,lang,topic,joinfiles,content) VALUES (100, 'sellyoursaas', 'contract',                        'InstanceDeployed',                NULL,'Welcome to __[SELLYOURSAAS_NAME]__ - Your instance __REFCLIENT__ is ready',   0, '<body>\n <p>Dear __[SELLYOURSAAS_NAME]__ user,<br><br>\nWe are delighted to welcome you as a user of __[SELLYOURSAAS_NAME]__, the Ondemand service of your ERP & CRM.\n                <br>\n                   Your __PACKAGELABEL__ is installed, setup and ready for you.\n                   Here are the details you need to get started:\n               \n                <br /><strong>Your __PACKAGELABEL__ :</strong>\n                <ul>\n                    <li>URL: <a href="https://__REFCLIENT__?username=__APPUSERNAME__">https://__REFCLIENT__</a></li>\n                    <li>Login: __APPUSERNAME__</li>\n                    <li>Password: __APPPASSWORD__</li>\n                </ul>\n                <br /><strong>Your customer dashboard :</strong>\n                <ul>\n                    <li>URL: <a href="__[SELLYOURSAAS_ACCOUNT_URL]__?username=__THIRDPARTY_EMAIL__">__[SELLYOURSAAS_ACCOUNT_URL]__</a></li>\n                    <li>Login: __THIRDPARTY_EMAIL__</li>\n                    <li>Password: __APPPASSWORD__</li>\n                </ul>                \n            \n            <br /></p>\n            Sincerly, <br />\n            The __[SELLYOURSAAS_NAME]__ Team <br />\n            ----------------------------------------- <br />\n            EMail: __[SELLYOURSAAS_MAIN_EMAIL]__<br />\n</body>\n            ');
INSERT INTO llx_c_email_templates (rowid,module,type_template,label,lang,topic,joinfiles,content) VALUES (110, 'sellyoursaas', 'contract',                        'InstanceUndeployed',              NULL,'[__[SELLYOURSAAS_NAME]__] - Please confirm the destruction of your instance __REFCLIENT__',   0, '<body>\n <p>Dear __[SELLYOURSAAS_NAME]__ user,<br><br>\nYou made a request on __[SELLYOURSAAS_NAME]__, the Ondemand service of your ERP & CRM to delete your instance <b>__REFCLIENT__</b>.\n                <br>\n                    Your instance was suspended and your data will be destroyed in few days. For an immediate deletion, please click on this link:<br><a href="__[SELLYOURSAAS_ACCOUNT_URL]__?contractid=__ID__&action=undeployconfirmed&hash=__HASH__">I confirm deletion of __REFCLIENT__</a>               \n            \n            <br /></p>\n            Sincerly, <br />\n            The __[SELLYOURSAAS_NAME]__ Team <br />\n            ----------------------------------------- <br />\n            EMail: __[SELLYOURSAAS_MAIN_EMAIL]__<br />\n</body>\n            ');
INSERT INTO llx_c_email_templates (rowid,module,type_template,label,lang,topic,joinfiles,content) VALUES (101, 'sellyoursaas', 'contract',                        'GentleTrialExpiringReminder',     NULL,'[__[SELLYOURSAAS_NAME]__] - Your Trial will soon expire',                     0, '<body>\n <p>Dear __[SELLYOURSAAS_NAME]__ user,<br><br>\nJust a quick reminder that trial of your instance __[REFCLIENT]__ will expire soon (__SELLYOURSAAS_EXPIRY_DATE__). If you wish to continue using this service, please login to your customer console to add a payment method (Credit or Paypal accepted).\n          </p>\n          <p>\nFor this, click here to go on your customer dashboard: <a href="__[SELLYOURSAAS_ACCOUNT_URL]__">__[SELLYOURSAAS_ACCOUNT_URL]__</a><br />\nRemind: Your customer dashboard login is <strong>__THIRDPARTY_EMAIL__</strong><br /><br />\nYou If you have entered this information recently, thank you to ignore this email.<br />\n</p>\n          <br />\n            Sincerly, <br />\n            The __[SELLYOURSAAS_NAME]__ Team <br />\n            ----------------------------------------- <br />\n            EMail: __[SELLYOURSAAS_MAIN_EMAIL]__<br />\n</body>\n       ');
INSERT INTO llx_c_email_templates (rowid,module,type_template,label,lang,topic,joinfiles,content) VALUES (103, 'sellyoursaas', 'facture_send',                    'InvoiceFailure',                  NULL,'[__[SELLYOURSAAS_NAME]__] - Invoice Payment Failure',                         0, '<body>\n <p>Dear __[SELLYOURSAAS_NAME]__ user,<br><br>\nAn attempt to take payment for invoice(s) owed has failed. Please update your payment method, or contact your bank or payment method provider.<br />\n                Should failure to take this payment continue, access to our service will be discontinued, and any data you have with us maybe lost.<br />\n<br />\nPlease login to your <a href="https://www.on.dolicloud.com/">Dolicloud dashboard</a> to update and fix your credit card or paypal information as soon as possible to prevent any interuptions in service.<br />\nRemind: Your DoliCloud dashboard login is ${person.email}<br />\n              </p>\n              <p>\n                The error we received from your bank was: <br />\n                ${invoice.notes.collect{ it }.join('' '')}\n              </p><br />\n\n            Sincerly, <br />\n            The __[SELLYOURSAAS_NAME]__ Team <br />\n            ----------------------------------------- <br />\n            EMail: __[SELLYOURSAAS_MAIN_EMAIL]__<br />\n</body>\n          ');
INSERT INTO llx_c_email_templates (rowid,module,type_template,label,lang,topic,joinfiles,content) VALUES (104, 'sellyoursaas', 'facture_send',                    'CreditCardExpiring',              NULL,'[__[SELLYOURSAAS_NAME]__] - Urgent: Your credit card is expiring',            0, '<body>\n <p>Dear __[SELLYOURSAAS_NAME]__ user,<br><br>\nWe wish to inform you that your payment method will soon expire.<br />\n              \n              Please login to your <a href="https://www.on.dolicloud.com/">Dolicloud dashboard</a> to update your credit card information as soon as possible to prevent any interuptions in service.<br />\nRemind: Your DoliCloud dashboard login is ${person.email}<br />\n            </p>\n            <p>If you have any questions relating to the above please do not hesitate get in touch.</p>\n<br />\n\n            Sincerly, <br />\n            The __[SELLYOURSAAS_NAME]__ Team <br />\n            ----------------------------------------- <br />\n            EMail: __[SELLYOURSAAS_MAIN_EMAIL]__<br />\n</body>\n        ');
INSERT INTO llx_c_email_templates (rowid,module,type_template,label,lang,topic,joinfiles,content) VALUES (106, 'sellyoursaas', 'thirdparty',                      'PasswordAssistance',              NULL,'[__[SELLYOURSAAS_NAME]__] - __(SubjectNewPasswordForYouCustomerDashboard)__', 0, '<body>\n <p>\n__(Hello)__,<br><br>\n__(RequestToResetPasswordReceived)__<br><br>__(YouMustClickToChange)__<br><br><a href="__URL_TO_RESET__">__URL_TO_RESET__</a><br><br>__(ApplicantIpAddress)__: __USER_REMOTE_IP__<br>__(ForgetIfNothing)__<br><br><p>\n__(Sincerly)__,<br><br>\n----------------------------------------- <br>The __[SELLYOURSAAS_NAME]__ Team<br>\nEMail: __[SELLYOURSAAS_MAIN_EMAIL]__<br>\n</body>');
INSERT INTO llx_c_email_templates (rowid,module,type_template,label,lang,topic,joinfiles,content) VALUES (107, 'sellyoursaas', 'thirdparty',                      'ChannelPartnerCreated',           NULL,'[__[SELLYOURSAAS_NAME]__] - Channel Partner Created',                         0, '<body>\n <p>Dear __[SELLYOURSAAS_NAME]__ user,<br><br>\nWe are delighted to welcome you as a Channel Partner of __[SELLYOURSAAS_NAME]__.\n          </p>\n          <p>\n             Your account has been setup for you.\n             Here are the details you need to get started:\n          </p>\n          <ul>\n              <li>Login link: <a href="__[SELLYOURSAAS_ACCOUNT_URL]__">__[SELLYOURSAAS_ACCOUNT_URL]__</a></li>\n              <li>Username: <strong>__THIRDPARTY_EMAIL__</strong></li>\n              <li>Temporary Password: <strong>__THIRDPARTY_NAMEALIAS__</strong></li>\n          </ul>                \n          <p>\n              Sincerly, <br />\n              The __[SELLYOURSAAS_NAME]__ Team <br />\n            ----------------------------------------- <br />\n            EMail: __[SELLYOURSAAS_MAIN_EMAIL]__<br />\n</body>\n        ');
INSERT INTO llx_c_email_templates (rowid,module,type_template,label,lang,topic,joinfiles,content) VALUES (108, 'sellyoursaas', 'contract',                        'CustomerAccountSuspended',        NULL,'[__[SELLYOURSAAS_NAME]__] - Account Suspension',                              0, '<body>\n <p>Dear __[SELLYOURSAAS_NAME]__ user,<br><br>\nWe wish to inform you your account has been suspended. This is likely due to a payment problem. If you wish to engage with us in addressing this send an email to support@dolicloud.com </p><br />\n Sincerly, <br /> \n               The __[SELLYOURSAAS_NAME]__ Team <br />\n            ----------------------------------------- <br />\n            EMail: __[SELLYOURSAAS_MAIN_EMAIL]__<br />\n</body>\n       ');
INSERT INTO llx_c_email_templates (rowid,module,type_template,label,lang,topic,joinfiles,content) VALUES (109, 'sellyoursaas', 'contract',                        'CustomerInstanceUpdated',         NULL,'[__[SELLYOURSAAS_NAME]__] - Instance upgrade',                                0, '<body>\n <p>Dear __[SELLYOURSAAS_NAME]__ user,<br><br>\nWe wish to inform you your instance has been upgraded to last stable version. If you experience problem after this upgrade, you can contact us at support@dolicloud.com </p><br />\n Sincerly, <br /> \n               The __[SELLYOURSAAS_NAME]__ Team <br />\n            ----------------------------------------- <br />\n            EMail: __[SELLYOURSAAS_MAIN_EMAIL]__<br />\n</body>\n       ');


