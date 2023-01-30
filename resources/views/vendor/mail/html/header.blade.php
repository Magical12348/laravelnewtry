<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Magical Umbrella')
<img src="https://www.magicalumbrella.com/images/logo.png" style="height:50px" class="logo" alt="Magical Umbrella Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
