<section class="panel"> 
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table mb-none">
                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actual Price</th>
                        <th scope="col">Asking Price</th>
                        <th scope="col">Posted On</th>
                        <?php if($loggedInUser['role_id'] == 1 || $viewBuyer): ?>
                            <th scope="col">Buyers</th>
                        <?php endif; ?>
                        <?php if($loggedInUser['role_id'] == 1 || $viewSeller): ?>
                            <th scope="col">Seller</th>
                        <?php endif; ?>    
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($interestedUsers as $key => $value): ?>
                        <tr>
                            <td><?= $this->Number->format($key+1) ?></td>
                            <td><?= h($value->product->name) ?></td>
                            <td><?= h($value->product->actual_price) ?></td>
                            <td><?= h($value->product->asking_price) ?></td>
                            <td><?= h($value->product->created) ?></td>
                            <?php if($loggedInUser['role_id'] == 1 || $viewBuyer): ?>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#buyerModal" onclick='buyerModal(<?= json_encode($value->users) ?>)'>
                                        View
                                    </a>
                                </td>
                            <?php endif; ?>   
                            <?php if($loggedInUser['role_id'] == 1 || ($viewSeller && $value->product->show_contact_info)): ?>
                                <td>
                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#sellerModal" onclick='sellerModal(<?= json_encode($value->product->user) ?>)'>
                                        View
                                    </a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="buyerModal" tabindex="-1" role="dialog" aria-labelledby="buyerModal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="panel-title text-center">Interested Buyers</h2>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="table-responsive">
                        <table class="table mb-none">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                </tr>
                            </thead>
                            <tbody id="buyersTable">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sellerModal" tabindex="-1" role="dialog" aria-labelledby="sellerModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="panel-title text-center">Seller Info</h2>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-offset-1">
                        <p><strong><?= __('Name') ?>:</strong> <span id="name">  </span><p>
                        <p><strong><?= __('Email') ?>:</strong> <span id="email">  </span><p>
                        <p><strong><?= __('Phone') ?>:</strong> <span id = "phone">  </span><p>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function sellerModal(data){

        $('#name').html(data.first_name+' '+data.last_name);
        $('#email').html(data.email);
        if(typeof data.phone != "undefined" && data.phone && data.phone != null && data.phone != ''){
            $('#phone').html(data.phone);
        }else{
            $('#phone').html('Not available');
        }
    }

    function buyerModal(data){
        console.log(data);
        $('#buyersTable').text('');
        for(x in data){
            sno = (x*1+1);
            name = data[x].first_name+' '+data[x].last_name;
            email = data[x].email;
            if(typeof data[x].phone != "undefined" && data[x].phone && data[x].phone != null && data[x].phone != ''){
                phone = data[x].phone;
            }else{
                phone = 'Not available';
            }
            html = "<tr><td>"+sno+"</td><td>"+name+"</td><td>"+email+"</td><td>"+phone+"</td></tr>"
            $('#buyersTable').append(html);
        }
    }


    
</script>