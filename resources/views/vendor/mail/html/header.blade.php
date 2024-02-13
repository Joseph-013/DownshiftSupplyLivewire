@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/423147316_917846429719034_1694046854495062762_n.png?_nc_cat=110&ccb=1-7&_nc_sid=510075&_nc_eui2=AeEBQQoMgyfnVQpL-3liaSJArpNGdDKRvhquk0Z0MpG-Gg-Lx8NdWKKmJvP2nj-0PjrljsOqhcyjIFKmnke97Z2U&_nc_ohc=owwEtZQEu2UAX8_QcE9&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdT-frFWqbG6lsgc5J9kt2X5H3IfEmB0jOA8pGGW-DEaQA&oe=65F26775"
                    class="logo" alt="Laravel Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
