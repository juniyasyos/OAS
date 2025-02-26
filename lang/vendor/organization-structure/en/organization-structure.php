<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Table Columns
    |--------------------------------------------------------------------------
    */

    'column.name' => 'Position Name',
    'column.level' => 'Position Level',
    'column.created_at' => 'Date Created',
    'column.updated_at' => 'Last Updated',
    'column.deleted_at' => 'Date Deleted',

    /*
    |--------------------------------------------------------------------------
    | Form Fields
    |--------------------------------------------------------------------------
    */

    'field.name' => 'Position Name',
    'field.name.placeholder' => 'Enter the position name',
    'field.name.helper' => 'This should be a unique name for the position.',

    'field.level' => 'Position Level',
    'field.level.placeholder' => 'Enter the position level',
    'field.level.helper' => 'A smaller level indicates greater seniority.',

    'field.description' => 'Position Description',
    'field.description.placeholder' => 'Provide a brief description of the position',

    /*
    |--------------------------------------------------------------------------
    | Section Details
    |--------------------------------------------------------------------------
    */

    'field.section-details' => 'Position Information',
    'field.section-details.description' => 'Provide detailed information about the position.',

    /*
    |--------------------------------------------------------------------------
    | Navigation & Resource
    |--------------------------------------------------------------------------
    */

    'nav.group' => 'Organization Structure',
    'nav.position.label' => 'Positions',
    'nav.position.icon' => 'heroicon-o-briefcase',

    'resource.label.position' => 'Position',
    'resource.label.positions' => 'Positions',

    /*
    |--------------------------------------------------------------------------
    | Actions
    |--------------------------------------------------------------------------
    */

    'action.create' => 'Add New Position',
    'action.edit' => 'Modify Position',
    'action.view' => 'View Position Details',
    'action.delete' => 'Move to Archive',
    'action.restore' => 'Restore Position',
    'action.force_delete' => 'Permanently Remove',
    'action.cancel' => 'Cancel',
    'action.save' => 'Save Changes',
    'action.back' => 'Go Back',

    /*
    |--------------------------------------------------------------------------
    | Messages & Notifications
    |--------------------------------------------------------------------------
    */

    'message.created' => 'The position has been successfully added.',
    'message.updated' => 'The position details have been updated.',
    'message.deleted' => 'The position has been archived.',
    'message.restored' => 'The position has been successfully restored.',
    'message.force_deleted' => 'The position has been permanently removed.',
    'message.not_found' => 'The requested position could not be found.',

    'forbidden' => 'You do not have the required permissions to access this.',

    /*
    |--------------------------------------------------------------------------
    | Filters
    |--------------------------------------------------------------------------
    */

    'filter.trashed' => 'Show Archived',
    'filter.active' => 'Active Positions',
    'filter.inactive' => 'Inactive Positions',

    /*
    |--------------------------------------------------------------------------
    | Status Labels
    |--------------------------------------------------------------------------
    */

    'status.active' => 'Active',
    'status.inactive' => 'Inactive',
    'status.trashed' => 'Archived',
];
