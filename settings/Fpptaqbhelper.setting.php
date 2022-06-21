<?php

use CRM_Fpptaqbhelper_ExtensionUtil as E;

return array(
  'fpptaqbhelper_cf_id_contribution' => array(
    'group_name' => 'FPPTA QuickBooks Helper Settings',
    'group' => 'fpptaqbhelper',
    'name' => 'fpptaqbhelper_cf_id_contribution',
    'add' => '5.0',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'Every contribution page will need this field to allow the user to indicate the donating organization',
    'title' => E::ts('Custom "Donating Organization" field for contributions'),
    'type' => 'Int',
    'quick_form_type' => 'Element',
    'default' => 0,
    'html_type' => 'Select',
    'html_attributes' => array(
      'class' => 'crm-select2',
      'style' => "width:auto;",
    ),
    'X_options_callback' => 'CRM_Fpptaqbhelper_Form_Settings::getCustomFieldsContribution',
  ),
  'fpptaqbhelper_cf_id_participant' => array(
    'group_name' => 'FPPTA QuickBooks Helper Settings',
    'group' => 'fpptaqbhelper',
    'name' => 'fpptaqbhelper_cf_id_participant',
    'add' => '5.0',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'Every event registration page will need this field to allow the user to indicate the donating organization',
    'title' => E::ts('Custom "Donating Organization" field for participants'),
    'type' => 'Int',
    'quick_form_type' => 'Element',
    'default' => 0,
    'html_type' => 'Select',
    'html_attributes' => array(
      'class' => 'crm-select2',
      'style' => "width:auto;",
    ),
    'X_options_callback' => 'CRM_Fpptaqbhelper_Form_Settings::getCustomFieldsParticipant',
  ),
);