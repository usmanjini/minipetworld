 <!-- Modal -->
     <div  class="modal fade" id="StripeCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div   class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pay with Stripe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="margin: 5%;" class="modal-body">
                     

                        <div class="row">
                            <div class="col-md-12">
                                <div><p class="stripe-error py-3 text-danger"></p></div>
                            </div>
                            <div class="col-md-12 required">
                                <div class="form-group">
                                    <label class="control-label">Name on Card</label>
                                    <input type="text" class="form-control" required size="4">
                                </div>
                            </div>

                            <div class="col-md-12 required">
                                <div class="form-group">
                                    <label class="control-label">Card Number</label>
                                    <input type="text" autocomplete='off' class="form-control card-number" required size="20">
                                </div>
                            </div>

                            <div class="col-md-4 required">
                                <div class="form-group">
                                    <label class='control-label'>CVC</label>
                                    <input type="text" autocomplete="off" class="form-control card-cvc" required placeholder="ex. 311" size="4">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Expiration Month</label>
                                    <input type="text" class="form-control card-expiry-month" required placeholder="MM" size="2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class='control-label'>Expiration Year</label>
                                    <input type="text" class="form-control card-expiry-year" required placeholder="YYYY" size="4">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group d-none">
                                <div class="alert-danger alert">
                                    <h6 class="inp-error">Please correct the errors and try again.</h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <input type="hidden" name="stipe_payment_btn" value="1">
                                <button type="submit" class="btn btn-primary btn-sm btn-block">Pay Now with Stripe</button>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>