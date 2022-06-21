# CiviCRM: FPPTA QuickBooks Sync Helper
## com.joineryhq.fpptaqbhelper

CiviCRM extension providing mportant features to support FPPTA QuickBooks integration:

* Allow admin to specify a custom field for identifying organizations on contributions and events.
* Alter that custom field:
   * Match on organization name only.
   * Avoid duplicates: for multiple orgs with identical name, use only the one with the lowest contact ID.

The extension is licensed under [GPL-3.0](LICENSE.txt).

## Configuration

Configuration settings are accessible via Administer > CiviContribute > FPPTA QuickBooks Settings
