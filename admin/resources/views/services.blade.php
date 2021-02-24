@extends('layout.app')
@section('tittle', 'home')
@section('content')
    @include('layout.menu')
    <div class="container d-none" id="mainDiv">
        <div class="row">
            <div class="col-md-12 p-5">
                <button id="add_new_service" class="btn btn-danger mb-3">Add new</button>
                <table id="courseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Image</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Description</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                    </thead>
                    <tbody id="service_table">
                        {{-- data from  custom js getServicesData method --}}
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="container" id='loaderDiv'>
        <div class="row">
            <div class="col-md-12  text-center p-5">
                <img src="{{ asset('images/loading.gif') }}" alt="" srcset="">

            </div>
        </div>
    </div>
    <div class="container d-none" id='wrongDiv'>
        <div class="row">
            <div class="col-md-12 p-5 mt-5">
                <h3 class="text-center">Something want wrong</h3>

            </div>
        </div>
    </div>



    {{-- DElete  Modal --}}
    <div class="modal fade" id="deletModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="text-center mt-4"> Do you want to delet?</h5>
                    <div class="s_delete_id d-none"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">NO</button>
                    <button type="button" id='service-d-confirm' data-id='' class="btn btn-sm btn-danger">YES</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Edite  Modal --}}
    <div class="modal fade" id="editetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div id="servive-edite-id" class="d-none"></div>
                <form class="p-5">
                    <!-- Name input -->
                    <div id="all-data-edit" class="w-100 d-none">
                        <div class="form-outline mb-4">
                            <input type="text" id="Service_image" class="form-control" />
                            <label class="form-label" for="form4Example1">Image url</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="Service_name" class="form-control" />
                            <label class="form-label" for="form4Example1">Service name</label>
                        </div>


                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="Service_des" rows="4"></textarea>
                            <label class="form-label" for="form4Example3">Service description</label>
                        </div>


                    </div>



                    <div id="service-edit-loader" class="text-center">
                        <img src="{{ asset('images/loading.gif') }}" alt="" srcset="">
                    </div>

                    <h3 id='service-edit-wrong' class="text-center d-none">Something want wrong</h3>


                    {{-- <button type="submit" class="btn btn-primary btn-block mb-4">Send</button> --}}
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id='service-e-confirm' class="btn btn-sm btn-danger">SAve</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Add  Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="p-5">
                    <h6 class="text-center">Add new service</h6>
                    <!-- Name input -->
                    <div id="all-data-edit" class="w-100">
                        <div class="form-outline mb-4">
                            <input type="text" id="Service_add_image" class="form-control" />
                            <label class="form-label" for="form4Example1">Image url</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="Service_add_name" class="form-control" />
                            <label class="form-label" for="form4Example1">Service name</label>
                        </div>


                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="Service_add_des" rows="4"></textarea>
                            <label class="form-label" for="form4Example3">Service description</label>
                        </div>


                    </div>

                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id='service_add_confirm' class="btn btn-sm btn-danger">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        getServicesData()

        //get service mathod
        function getServicesData() {

            axios.get('/serviceget')
                .then(function(response) {
                    if (response.status == 200) {
                        $('#courseDataTable').DataTable().destroy();
                        $('#service_table').empty()
                        $('#mainDiv').removeClass('d-none');
                        $('#loaderDiv').addClass('d-none');
                        var dataJSON = response.data;
                        $.each(dataJSON, function(i, item) {
                            $('<tr>').html(
                                `<td class="th-sm"><img class="table-img" src="${dataJSON[i].service_img}"></td>
                                     <td class="th-sm">${dataJSON[i].service_name}</td>
                                     <td class="th-sm">${dataJSON[i].service_des}</td>
                                     <td class="th-sm"><a  class="service-edit-btn" data-id=${dataJSON[i].id} ><i class="fas fa-edit"></i></a></td>
                                     <td class="th-sm"><a  class="service-delete-btn" data-id=${dataJSON[i].id} ><i class="fas fa-trash-alt"></i></a></td>`
                            ).appendTo('#service_table')
                        });

                        // service table delete button click
                        $('.service-delete-btn').click(function() {
                            $id = $(this).data('id')
                            $('.s_delete_id').html($id)
                            //   $('#service-d-confirm').attr('data-id', $id)
                            $('#deletModal').modal('show');
                        })

                        // service table edite button click
                        $('.service-edit-btn').click(function() {
                            $id = $(this).data('id')
                            $('#servive-edite-id').html($id)
                            services_edit_details($id)
                            $('#editetModal').modal('show');
                        })
                        $('#courseDataTable').DataTable({order:false})
                        $('.dataTables_length').addClass('bs-select');
                    } else {
                        $('#loaderDiv').addClass('d-none');
                        $('#wrongDiv').removeClass('d-none');
                    }
                }).catch(function(error) {
                    $('#loaderDiv').addClass('d-none');
                    $('#wrongDiv').removeClass('d-none');
                    $('#mainDiv').addClass('d-none');
                });
        }

        // service table delete button confirm  click
        $('#service-d-confirm').click(function() {
            // $id = $(this).data('id')
            $id = $('.s_delete_id').html()
            services_delete($id)
        })


        //  3-> service delete
        function services_delete(deletId) {
            $('#service-d-confirm').html(`<div class="spinner-border spinner-border-sm" role="status"></div>`)

            axios.post('/servicesdelete', {
                    id: deletId
                })
                .then(function(response) {

                    $('#service-d-confirm').html('yes')
                    if (response.status == 200) {
                        if (response.data == 1) {
                            $('#deletModal').modal('hide');
                            getServicesData()
                            toastr.success('delete successfully ');

                        } else {
                            $('#deletModal').modal('hide');
                            getServicesData()
                            toastr.error('delete faild');
                        }
                    } else {
                        $('#deletModal').modal('hide');
                        toastr.error('delete fail ');
                        getServicesData()
                    }
                })
                .catch(function(err) {
                    $('#service-d-confirm').html('yes')
                    $('#deletModal').modal('hide');
                    toastr.error('delete fail catch');
                    getServicesData()
                })
        }

        // services_edit_setals
        function services_edit_details(editId) {
            $("#service-edit-wrong").not(".d-none").addClass("d-none");
            ($("#service-edit-loader").hasClass("d-none")) ? $("#service-edit-loader").removeClass("d-none"): '';
            axios.post('/servicesdetails', {
                    id: editId
                })
                .then(function(response) {
                    if (response.status == 200) {

                        $('#service-edit-loader').addClass('d-none')
                        $('#all-data-edit').removeClass('d-none')
                        $jsonData = response.data
                        $('#Service_name').val($jsonData[0].service_name)
                        $('#Service_image').val($jsonData[0].service_img)
                        $('#Service_des').val($jsonData[0].service_des)


                    } else {
                        $('#service-edit-loader').addClass('d-none')
                        $('#service-edit-wrong').removeClass('d-none')
                    }
                })
                .catch(function(err) {
                    $('#service-edit-loader').addClass('d-none')
                    $('#service-edit-wrong').removeClass('d-none')
                })
        }

        // service edite  confirm
        $('#service-e-confirm').click(function() {

            $id = $('#servive-edite-id').html()
            $Service_image = $('#Service_image').val()
            $Service_name = $('#Service_name').val()
            $Service_des = $('#Service_des').val()
            services_update($id, $Service_image, $Service_name, $Service_des)
        })

        // service edite  mathod

        function services_update(s_Id, s_img, s_name, s_des) {
            if (s_Id.length == 0) {
                toastr.error('some thing wrong');
            } else if (s_img.length == 0) {
                toastr.error('service image is empty');
            } else if (s_name.length == 0) {
                toastr.error('service name is empty');
            } else if (s_des.s_des == 0) {
                toastr.error('service details is empty');
            } else {
                $('#service-e-confirm').html(`<div class="spinner-border spinner-border-sm" role="status"></div>`)
                axios.post('/servicesUpdate', {
                        id: s_Id,
                        img: s_img,
                        name: s_name,
                        desc: s_des
                    })
                    .then(function(response) {
                        $('#service-e-confirm').html('save')
                        if (response.status == 200) {
                            if (response.data == 1) {
                                $('#editetModal').modal('hide');
                                toastr.success('update  successfully ');
                                getServicesData()
                            } else {
                                $('#editetModal').modal('hide');
                                toastr.error('update faild ');
                                getServicesData()


                            }
                        } else {

                            $('#editetModal').modal('hide');
                            toastr.error('someting went wrong');
                            getServicesData()
                        }


                    })
                    .catch(function(err) {
                        $('#service-e-confirm').html('save')
                        $('#editetModal').modal('hide');
                        toastr.error('update faild ');
                        getServicesData()

                    })
            }


        }


        // add new service btn clickEvent
        $('#add_new_service').click(function(e) {
            $('#addModal').modal('show');

        })


        // service add confirm
        $('#service_add_confirm').click(function() {

            $Service_image = $('#Service_add_image').val()
            $Service_name = $('#Service_add_name').val()
            $Service_des = $('#Service_add_des').val()
            services_add($Service_image, $Service_name, $Service_des)
        })


        // service add method
        function services_add(s_img, s_name, s_des) {
            if (s_img.length == 0) {
                toastr.error('service image is empty');
            } else if (s_name.length == 0) {
                toastr.error('service name is empty');
            } else if (s_des.s_des == 0) {
                toastr.error('service details is empty');
            } else {
                $('#service_add_confirm').html(`<div class="spinner-border spinner-border-sm" role="status"></div>`)
                axios.post('/servicesAdd', {
                        img: s_img,
                        name: s_name,
                        desc: s_des
                    })
                    .then(function(response) {
                        $('#service_add_confirm').html('save')
                        if (response.status == 200) {
                            if (response.data == 1) {
                                $('#editetModal').modal('hide');
                                toastr.success('update  successfully ');
                                $Service_image = $('#Service_add_image').val('')
                                $Service_name = $('#Service_add_name').val('')
                                $Service_des = $('#Service_add_des').val('')
                                getServicesData()
                            } else {
                                $('#editetModal').modal('hide');
                                toastr.error('update faild ');
                                getServicesData()
                            }
                        } else {
                            $('#service_add_confirm').html('save')
                            $('#editetModal').modal('hide');
                            toastr.error('someting went wrong');
                            getServicesData()
                        }
                    })
                    .catch(function(err) {
                        $('#service_add_confirm').html('save')
                        $('#editetModal').modal('hide');
                        toastr.error('update faild ');
                        getServicesData()
                    })
            }
        }


    </script>
@endsection
