<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMicrowavelinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'curr_lic_num' => 'required|string|max:191',
            // 'clnt_id' => 'required|biginteger|max:191',
            // 'appl_id' => 'required|biginteger|max:191',
            // 'freq_pair' => 'nullable|double|max:191',
            // 'erp_pwr_dbm' => 'required|double|max:191',
            // 'bwidth' => 'required|biginteger|max:191',
            // 'eq_mdl' => 'required|string|max:191',
            // 'ant_mdl' => 'required|string|max:191',
            // 'hgt_ant' => 'required|integer|max:191',
            // 'master_plzn_code' => 'required|string|max:191',
            // 'sid_long' => 'required|double|max:191',
            // 'sid_lat' => 'required|double|max:191',
            // 'link_id' => 'required|biginteger|max:191',
            // 'mon_query' => 'required|datetime',
        ];
    }
}
