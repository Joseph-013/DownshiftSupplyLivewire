@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://dslcloudstorage2.blob.core.windows.net/productimages/logo1.png?fbclid=IwAR0vPV2a0p-RgDTQOsv0CUKRVheD_zGfo1mB16IgitMa7lIpx6fUy5e9Ig4"
                    class="logo" alt="Laravel Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
