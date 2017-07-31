<style>
    .button{
        background:transparent;
        color: #002287;
        border:1px solid #002287;
        border-radius: 4px;
        height: 30px;
        margin-top: 2px;
        cursor: pointer;
    }
    .button:hover{
        background-color: #002287;
        color: #fff;
        border:1px solid #002287;
        border-radius: 4px;
    }
    .buttonsin{
        background:transparent;
        color: #002287;
        border:1px solid #002287;
        border-radius: 4px;
        height: 30px;
        margin-top: 2px;
        cursor: pointer;
    }

    .botonItemMenu {
        width: 50%;
        margin-top: 15px;
        margin-left: 25%;
        padding-top: 10px;
        padding-bottom: 10px;
        height: 10%;
    }
</style>

<div>
    @if(checkPermission('click_me_sol_gas_viaje'))
        <button class="botonItemMenu buttonsin"> Solicitud de gastos de viaje</button>
    @else
        <button class="botonItemMenu button" onclick="window.top.location.href='{{ route('solicitud_travel') }}' "> Solicitud de gastos de viaje</button>
    @endif

    <button class="botonItemMenu button"> Tranferencia de saldo </button>
</div>