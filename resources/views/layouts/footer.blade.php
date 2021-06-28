
<modal-component :company_id ="{{auth()->user()->company_id}}"></modal-component>
</div><!--#app-->

@if (!empty($footer))

{{ $footer }}

@endif

</body>
</html>
