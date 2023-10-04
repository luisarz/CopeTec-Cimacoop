<table class="table table-hover  table-row-dashed fs-5     gy-2 gs-5">
    <thead>
        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
            <th>Año</th>
            <th>mes</th>
            <th class="min-w-20px">nombre</th>
            <th class="min-w-20px">tipo_per</th>
            <th class="min-w-80px">Num_ptmo</th>
            <th class="min-w-80px">Inst</th>
            <th class="min-w-80px">fec_otor</th>
            <th class="min-w-30px">monto</th>
            <th class="min-w-30px">plazo</th>
            <th class="min-w-30px">saldo</th>
            <th class="min-w-30px">mora</th>
            <th class="min-w-30px">forma_pag</th>
            <th class="min-w-30px">tipo_rel</th>
            <th class="min-w-30px">linea_cre</th>
            <th class="min-w-30px">dias </th>
            <th class="min-w-30px">ult_pag
            </th>
            <th class="min-w-30px">tipo_gar
            </th>
            <th class="min-w-30px">tipo_mon
            </th>
            <th class="min-w-30px">valcuota
            </th>
            <th class="min-w-30px">dia
            </th>
            <th class="min-w-30px">fechanac
            </th>
            <th class="min-w-30px">dui
            </th>
            <th class="min-w-30px">nit
            </th>
            <th class="min-w-80px">fecha_can
            </th>
            <th class="min-w-80px">fecha_ven
            </th>
            <th class="min-w-80px">ncuotascre
            </th>
            <th class="min-w-80px">calif_act</th>
            <th class="min-w-80px">activi_eco
            </th>
            <th class="min-w-80px">sexo
            </th>

            <th>estcredito</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($creditos as $credito)
            <tr>
                <td>{{ date('Y') }}</td>
                <td>{{ date('m') }}</td>
                <td>{{ $credito->cliente->nombre }}</td>
                <td>1</td>
                <td>{{ $credito->codigo_credito }}</td>
                <td></td>
                <td>{{ \Carbon\Carbon::parse($credito->fecha_desembolso)->format('d/m/Y') }}
                </td>
                <td>@money($credito->monto_solicitado)</td>
                <td>{{ $credito->plazo }}</td>
                <td>
                    ${{ $credito->saldo_capital <= 0 ? number_format(0, 2) : number_format($credito->saldo_capital, 2) }}
                </td>
                <td>Pendiente Confirmar</td>
                <td>5</td>
                <td>1</td>
                <td>COM</td>
                <td>
                    @php
                        $diasMora = (strtotime(date('Y-m-d')) - strtotime($credito->ultima_fecha_pago)) / 86400;
                    @endphp
                    @if ($diasMora - 30 > 0)
                        <span class="badge badge-light-danger">{{ $diasMora - 30 }} </span>
                    @else
                        <span class="badge badge-light-success">0</span>
                    @endif

                </td>
                <td>
                    {{ date('d/m/Y', strtotime($credito->ultima_fecha_pago)) }}
                </td>
                <td> N/A</td>
                <td> 2</td>
                <td>${{ number_format($credito->cuota, 2) }}</td>
                <td>31</td>
                <td>
                    {{ \Carbon\Carbon::parse($credito->cliente->fecha_nacimiento)->format('d/m/Y') }}
                </td>
                <td>{{ $credito->cliente->dui_cliente }}</td>
                <td></td>
                <td>
                    @if ($credito->saldo_capital <= 0)
                        {{ $credito->ultima_fecha_pago }}
                    @endif
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($credito->fecha_vencimiento)->format('d/m/Y') }}
                </td>
                <td>
                    {{ $credito->plazo }}
                </td>
                <td>
                    @if ($credito->cliente->score)
                        {{ $credito->cliente->score->score }}
                    @endif
                </td>
                <td>COM</td>


                <td>{{ $credito->cliente->genero == 0 ? 'M' : 'F' }}</td>
                <td>
                    @if ($credito->saldo_capital <= 0)
                        1
                    @else
                        @if ($credito->estado == 2)
                            3
                        @endif
                    @endif

                </td>

            </tr>
        @endforeach
    </tbody>
</table>
