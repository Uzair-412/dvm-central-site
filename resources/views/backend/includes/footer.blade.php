<footer class="c-footer">
    <div>
        <strong>
            @lang('Copyright') &copy; {{ date('Y') }}
            <x-utils.link href="/" target="_blank" :text="__(appName())" />
        </strong>
        @lang('All Rights Reserved')
    </div>
    <div class="mfs-auto">
        @lang('Powered by')
        <x-utils.link href="/" target="_blank" :text="__(appName())" /> &
        <x-utils.link href="https://germedusait.com" target="_blank" text="GerMedUSAIT" />
    </div>
</footer>
<!-- Alert Messages Modal -->
<div class="modal fade" id="modal_alert" tabindex="-1" role="dialog" aria-labelledby="modal_alertTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center" id="modal_alert_message">
            </div>
            {{--<div class="text-center pb--15">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            </div>--}}
        </div>
    </div>
</div>
<!-- lert Messages Modal -->