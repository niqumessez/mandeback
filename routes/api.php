<?php
use Tymon\JWTAuth\Http\Middleware\RefreshToken;
use Dingo\Api\Routing\Router;
/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

        $api->post('logout', 'App\\Api\\V1\\Controllers\\LogoutController@logout');
        $api->post('refresh', 'App\\Api\\V1\\Controllers\\RefreshController@refresh');
        $api->get('me', 'App\\Api\\V1\\Controllers\\UserController@me');
        $api->get('users', 'App\\Api\\V1\\Controllers\\UserController@index');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->resource('program_categories', 'App\\Api\\V1\\Controllers\\ProgramCategoryAPIController');
        $api->resource('programs', 'App\\Api\\V1\\Controllers\\ProgramAPIController');
        $api->resource('program_details', 'App\\Api\\V1\\Controllers\\ProgramDetailAPIController');
        $api->resource('project_categories', 'App\\Api\\V1\\Controllers\\ProjectCategoryAPIController');
        $api->resource('projects', 'App\\Api\\V1\\Controllers\\ProjectAPIController');
        $api->resource('project_details', 'App\\Api\\V1\\Controllers\\ProjectDetailAPIController');
        $api->resource('implementers', 'App\\Api\\V1\\Controllers\\ImplementerAPIController');
        $api->resource('beneficiaries', 'App\\Api\\V1\\Controllers\\BeneficiaryAPIController');
        $api->resource('clusters', 'App\\Api\\V1\\Controllers\\ClusterAPIController');
        $api->resource('cluster_members', 'App\\Api\\V1\\Controllers\\ClusterMemberAPIController');
        $api->resource('regions', 'App\\Api\\V1\\Controllers\\RegionAPIController');
        $api->resource('zones', 'App\\Api\\V1\\Controllers\\ZoneAPIController');
        $api->resource('woredas', 'App\\Api\\V1\\Controllers\\WoredaAPIController');
        $api->resource('kebeles', 'App\\Api\\V1\\Controllers\\KebeleAPIController');
        $api->resource('frequencies', 'App\\Api\\V1\\Controllers\\FrequencyAPIController');
        $api->resource('project_beneficiaries', 'App\\Api\\V1\\Controllers\\ProjectBeneficiaryAPIController');
        $api->resource('project_implementers', 'App\\Api\\V1\\Controllers\\ProjectImplementerAPIController');
        $api->resource('project_frequencies', 'App\\Api\\V1\\Controllers\\ProjectFrequencyAPIController');
        $api->resource('statuses', 'App\\Api\\V1\\Controllers\\StatusAPIController');
        $api->resource('outcomes', 'App\\Api\\V1\\Controllers\\OutcomeAPIController');
        $api->resource('outputs', 'App\\Api\\V1\\Controllers\\OutputAPIController');
        $api->resource('indicators', 'App\\Api\\V1\\Controllers\\IndicatorAPIController');
        $api->resource('outcome_indicators', 'App\\Api\\V1\\Controllers\\OutcomeIndicatorAPIController');
        $api->resource('output_indicators', 'App\\Api\\V1\\Controllers\\OutputIndicatorAPIController');
        $api->resource('time_plans', 'App\\Api\\V1\\Controllers\\TimePlanAPIController');
        $api->resource('data_types', 'App\\Api\\V1\\Controllers\\DataTypeAPIController');
        $api->resource('measuring_units', 'App\\Api\\V1\\Controllers\\MeasuringUnitAPIController');
        $api->resource('activities', 'App\\Api\\V1\\Controllers\\ActivityAPIController');
        $api->resource('activity_budgets', 'App\\Api\\V1\\Controllers\\ActivityBudgetAPIController');
        $api->resource('activity_categories', 'App\\Api\\V1\\Controllers\\ActivityCategoryAPIController');
        $api->resource('disaggregation_methods', 'App\\Api\\V1\\Controllers\\DisaggregationMethodAPIController');
        $api->resource('indicator_disaggregation_methods', 'App\\Api\\V1\\Controllers\\IndicatorDisaggregationMethodAPIController');
        $api->resource('indicator_forms', 'App\\Api\\V1\\Controllers\\IndicatorFormAPIController');
        $api->resource('activity_indicators', 'App\\Api\\V1\\Controllers\\ActivityIndicatorAPIController');
        $api->resource('budgets', 'App\\Api\\V1\\Controllers\\BudgetAPIController');
        $api->resource('expenditure_categories', 'App\\Api\\V1\\Controllers\\ExpenditureCategoryAPIController');
        $api->resource('expenditures', 'App\\Api\\V1\\Controllers\\ExpenditureAPIController');
        $api->resource('finance_plans', 'App\\Api\\V1\\Controllers\\FinancePlanAPIController');
        $api->resource('monthly_expenditures', 'App\\Api\\V1\\Controllers\\MonthlyExpenditureAPIController');
        $api->get('get_monthly_expenditures_by_finance_plan/{finance_plan_id}', 'App\\Api\\V1\\Controllers\\MonthlyExpenditureAPIController@getMonthlyExpenditureByFinancePlan');
        $api->resource('finances', 'App\\Api\\V1\\Controllers\\FinanceAPIController');
        $api->get('project-finance/{id}', 'App\\Api\\V1\\Controllers\\FinanceAPIController@getFinanceByProject');
        $api->resource('donors', 'App\\Api\\V1\\Controllers\\DonorAPIController');
        $api->resource('currencies', 'App\\Api\\V1\\Controllers\\CurrencyAPIController');
        $api->resource('files', 'App\\Api\\V1\\Controllers\\FileAPIController');
        $api->resource('milestones', 'App\\Api\\V1\\Controllers\\MilestoneAPIController');
        $api->resource('milestone_actual_values', 'App\\Api\\V1\\Controllers\\MilestoneActualValueAPIController');
        $api->get('outcome_outputs/{id}', 'App\\Api\\V1\\Controllers\\OutputAPIController@getOutputsByOutcome');
        $api->get('financial-report/{plans}', 'App\\Api\\V1\\Controllers\\ExpenditureCategoryAPIController@getData');

        //meseret's routing
        $api->resource('users','App\\Api\\V1\\Controllers\\UserController');
        $api->resource('forms','App\\Api\\V1\\Controllers\\FormController');
        $api->resource('form_sections','App\\Api\\V1\\Controllers\\FormSectionController');
        $api->resource('generated_forms','App\\Api\\V1\\Controllers\\GeneratedFormController');
        $api->resource('form_columns','App\\Api\\V1\\Controllers\\FormsColumnController');
        $api->resource('form_datas','App\\Api\\V1\\Controllers\\FormsDataController');
        $api->resource('shared_forms','App\\Api\\V1\\Controllers\\SharedFormController');
        $api->resource('roles','App\\Api\\V1\\Controllers\\RoleController');
        $api->resource('role_permissions','App\\Api\\V1\\Controllers\\RolePermissionController');
        $api->resource('models','App\\Api\\V1\\Controllers\\ModelsController');
        $api->resource('permissions','App\\Api\\V1\\Controllers\\PermissionController');
        $api->resource('calculation_methods','App\\Api\\V1\\Controllers\\CalculationMethodController');
        $api->resource('indicator_calculation_methods','App\\Api\\V1\\Controllers\\IndicatorCalculationMethodController');
        $api->resource('data_entries','App\\Api\\V1\\Controllers\\DataEntryController');
        $api->resource('current','App\\Api\\V1\\Controllers\\DatePeriodGeneratorController');
        $api->resource('data_entry_disaggregation','App\\Api\\V1\\Controllers\\DataEntryDisaggregationController');
        $api->resource('indicator_form_fields','App\\Api\\V1\\Controllers\\IndicatorFieldsTobeCalculatedController');

        /* $api->group(['middleware'=>'permission'],function (Router $api){
            $api->resource('role','App\\Api\\V1\\Controllers\\RoleController');
            $api->resource('role-permission','App\\Api\\V1\\Controllers\\RolePermissionController');
        });*/
        //end of meseret's routing


        $api->get('refresh', function(){
            $token = auth()->guard()->refresh();
            return response()->json([
                'status' => 'ok',
                'token' => $token,
                'expires_in' => auth()->guard()->factory()->getTTL() * 60
            ]);
        });
    });
    $api->resource('form_data_files','App\\Api\\V1\\Controllers\\FormDataFileController');
    $api->resource('outer','App\\Api\\V1\\Controllers\\OuterDocumentController');

});
