<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Http\Requests\CountyRequest;

class CountyController extends Controller
{
    /**
     * Retorna todos os municípios quando não for especificado nenhum parâmetro no corpo da requisição
     *
     * @param County $counties
     * @param CountyRequest $request
     * @return void
     */
    public function index(County $counties, CountyRequest $request)
    {
        //monta a query
        $results = $counties->where('status',1);
        //filtro ibge
        $request->filled('ibge') ? $results->where('ibge',$request->safe()->ibge) : '';
        //filtro nome
        $request->filled('name') ? $results->where('name','like', '%'.$request->safe()->name.'%') : '';
        //filtro microrregião
        $request->filled('microregion') ? $results->where('microregion','like', '%'.$request->safe()->microregion.'%') : '';
        //filtro macrorregião
        $request->filled('macroregion') ? $results->where('macroregion','like', '%'.$request->safe()->macroregion.'%') : '';
        //filtro município pólo
        $request->filled('poleMunicipality') ? $results->where('poleMunicipality','like', '%'.$request->safe()->poleMunicipality.'%') : '';
        //executa a query
        return $results->paginate(10);
    }

    /**
     * Retorna um município específico com base no id
     *
     * @param County $county
     * @return void
     */
    public function show(County $county)
    {
        return $county;        
    }
    
    /**
     * Retorna a lista de todas as microrregiões de saúde
     *
     * @return void
     */
    public function microregions()
    {
        return County::where('status',1)->distinct()->pluck('microregion');
    }
    
    /**
     * Retorna a lista de todos os municípios pólos
     *
     * @return void
     */
    public function poleMunicipalities()
    {
        return County::where('status',1)->distinct()->pluck('poleMunicipality');
    }
    
    /**
     * Retorna a lista de todas as macrorregiões de saúde
     *
     * @return void
     */
    public function macroregions()
    {
        return County::where('status',1)->distinct()->pluck('macroregion');
    }
    
}
