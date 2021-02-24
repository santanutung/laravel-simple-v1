@extends('layout.app')
@section('tittle', 'home')
@section('content')
    @include('layout.menu')

    <div class="container d-none" id='main_course_div'>
        <div class="row">
            <div class="col-md-12 p-5">
                <button class="btn btn-danger mb-4" id="add_course_btn">Add new</button>
                <table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Course Name</th>
                            <th class="th-sm">Course Fee</th>
                            <th class="th-sm">Course enrolled </th>
                            <th class="th-sm">Total class</th>
                            <th class="th-sm">Details class</th>
                            <th class="th-sm">Edited</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                    </thead>

                    <tbody id="course_data_table">
                        {{-- data from  custom js getCourseData method --}}
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="container" id='loader_course_Div'>
        <div class="row">
            <div class="col-md-12  text-center p-5">
                <img src="{{ asset('images/loading.gif') }}" alt="" srcset="">

            </div>
        </div>
    </div>

    <div class="container d-none" id='wrong_course_Div'>
        <div class="row">
            <div class="col-md-12 p-5 mt-5">
                <h3 class="text-center">Something want wrong</h3>

            </div>
        </div>
    </div>

    {{-- add new course  model --}}
    <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="CourseNameId" type="text" id="" class="form-control mb-3"
                                    placeholder="Course Name">
                                <input id="CourseDesId" type="text" id="" class="form-control mb-3"
                                    placeholder="Course Description">
                                <input id="CourseFeeId" type="text" id="" class="form-control mb-3"
                                    placeholder="Course Fee">
                                <input id="CourseEnrollId" type="text" id="" class="form-control mb-3"
                                    placeholder="Total Enroll">
                            </div>
                            <div class="col-md-6">
                                <input id="CourseClassId" type="text" id="" class="form-control mb-3"
                                    placeholder="Total Class">
                                <input id="CourseLinkId" type="text" id="" class="form-control mb-3"
                                    placeholder="Course Link">
                                <input id="CourseImgId" type="text" id="" class="form-control mb-3"
                                    placeholder="Course Image">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{-- DElete  Modal --}}
    <div class="modal fade" id="coursedeletModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="text-center mt-4"> Do you want to delet?</h5>
                    <div class="course_delete_id d-none"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">NO</button>
                    <button type="button" id='course-d-confirm' data-id='' class="btn btn-sm btn-danger">YES</button>
                </div>
            </div>
        </div>
    </div>



    {{-- Edide course  model --}}
    <div class="modal fade" id="editeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="course_edidet_data">
                <div class="modal-header">
                    <h5 class="modal-title" class="text-center">Edite Course</h5>

                    <h6 id="editeModalId" class="text-center d-none"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container d-none" id="course_edidit_data">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="CourseNameId_edit" type="text" class="form-control mb-3"
                                    placeholder="Course Name">
                                <input id="CourseDesId_edit" type="text" class="form-control mb-3"
                                    placeholder="Course Description">
                                <input id="CourseFeeId_edit" type="text" class="form-control mb-3" placeholder="Course Fee">
                                <input id="CourseEnrollId_edit" type="text" class="form-control mb-3"
                                    placeholder="Total Enroll">
                            </div>
                            <div class="col-md-6">
                                <input id="CourseClassId_edit" type="text" class="form-control mb-3"
                                    placeholder="Total Class">
                                <input id="CourseLinkId_edit" type="text" class="form-control mb-3"
                                    placeholder="Course Link">
                                <input id="CourseImgId_edit" type="text" class="form-control mb-3"
                                    placeholder="Course Image">
                            </div>
                        </div>
                    </div>

                    <div id="course-edit-loader" class="text-center">
                        <img src="{{ asset('images/loading.gif') }}" alt="" srcset="">
                    </div>

                    <h5 id='course-edit-wrong' class="text-center d-none">Something want wrong</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button id="CourseEditeConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        getCourseData()
        //get Course mathod
        function getCourseData() {
            axios.get('/courseGet')
                .then(function(response) {
                    if (response.status == 200) {
                        $('#serviceDataTable').DataTable().destroy()
                        $('#course_data_table').empty()

                        $('#main_course_div').removeClass('d-none');
                        $('#loader_course_Div').addClass('d-none');
                        var dataJSON = response.data;
                        $.each(dataJSON, function(i, item) {
                            $('<tr>').html(
                                `<td class="th-sm">${dataJSON[i].course_name}</td>
                                    <td class="th-sm">${dataJSON[i].course_fee}</td>
                                    <td class="th-sm">${dataJSON[i].course_totalenroll}</td>
                                    <td class="th-sm">${dataJSON[i].course_totalclass}</td>
                                    <td class="th-sm text-center"><a   class="coure-view-btn d-block" data-id=${dataJSON[i].id}><i class="fas fa-eye"></i></a></td>
                                    <td class="th-sm text-center"><a  class="coure-edit-btn d-block" data-id=${dataJSON[i].id}><i class="fas fa-edit"></i></a></td>
                                    <td class="th-sm text-center"><a   class="coure-delet-btn d-block" data-id=${dataJSON[i].id}><i class="fas fa-trash-alt"></i></a></td>`
                            ).appendTo('#course_data_table')
                        });



                        // course  table delete button click
                        $('.coure-delet-btn').click(function() {

                            $id = $(this).data('id')
                            $('.course_delete_id').html($id)
                            $('#course-d-confirm').attr('data-id', $id)
                            $('#coursedeletModal').modal('show');
                        })

                        // course  table edit button click
                        $('.coure-edit-btn').click(function() {
                            $id = $(this).data('id')
                            $('#editeModalId').html($id)
                            course_edit_details($id)
                            $('#editeModal').modal('show');
                            $('#course_edidit_data input').prop("disabled", false)
                        })

                        // course  table view button click
                        $('.coure-view-btn').click(function() {
                            $id = $(this).data('id')
                            course_edit_details($id)
                            $('#editeModal').modal('show');
                            $('#CourseEditeConfirmBtn').hide()
                            $('#course_edidit_data input').prop("disabled", true)
                        })


                        $('#serviceDataTable').DataTable({order:false})
                        $('.dataTables_length').addClass('bs-select');

                    } else {
                        $('#loader_course_Div').addClass('d-none');
                        $('#wrong_course_Div').removeClass('d-none');
                    }
                }).catch(function(error) {
                    $('#loader_course_Div').addClass('d-none');
                    $('#wrong_course_Div').removeClass('d-none');

                });
        }

        // course open modal

        $('#add_course_btn').click(function() {
            $('#addCourseModal').modal('show');
        })

        // course add confirm
        $('#CourseAddConfirmBtn').click(function() {
            let course_name = $('#CourseNameId').val()
            let course_des = $('#CourseDesId').val()
            let course_fee = $('#CourseFeeId').val()
            let course_totalenroll = $('#CourseEnrollId').val()
            let course_totalclass = $('#CourseClassId').val()
            let course_link = $('#CourseLinkId').val()
            let course_img = $('#CourseImgId').val()
            course_add(course_name, course_des, course_fee, course_totalenroll, course_totalclass, course_link,
                course_img)
        })


        // course add method
        function course_add(course_name, course_des, course_fee, course_totalenroll, course_totalclass, course_link,
            course_img) {
            if (course_name.length == 0) {
                toastr.error('course name is empty');
            } else if (course_des.length == 0) {
                toastr.error('course description is empty');
            } else if (course_fee.length == 0) {
                toastr.error('course fee is empty');
            } else if (course_totalenroll.length == 0) {
                toastr.error('course totalenroll is empty');
            } else if (course_totalclass.length == 0) {
                toastr.error('course totalclass is empty');
            } else if (course_link.length == 0) {
                toastr.error('course link is empty');
            } else if (course_img.length == 0) {
                toastr.error('course img is empty');
            } else {
                $('#CourseAddConfirmBtn').html(`<div class="spinner-border spinner-border-sm" role="status"></div>`)
                axios.post('/courseAdd', {
                        course_name: course_name,
                        course_des: course_des,
                        course_fee: course_fee,
                        course_totalenroll: course_totalenroll,
                        course_totalclass: course_totalclass,
                        course_link: course_link,
                        course_img: course_img
                    })
                    .then(function(response) {
                        $('#CourseAddConfirmBtn').html('save')
                        if (response.status == 200) {
                            if (response.data == 1) {
                                $('#addCourseModal').modal('hide');
                                toastr.success('Course added  successfully ');
                                getCourseData()
                                $('#CourseNameId').val('')
                                $('#CourseDesId').val('')
                                $('#CourseFeeId').val('')
                                $('#CourseEnrollId').val('')
                                $('#CourseClassId').val('')
                                $('#CourseLinkId').val('')
                                $('#CourseImgId').val('')

                            } else {
                                $('#addCourseModal').modal('hide');
                                toastr.error('Course added faild ');
                                getCourseData()
                            }
                        } else {
                            $('#CourseAddConfirmBtn').html('save')
                            $('#editetModal').modal('hide');
                            toastr.error('someting went wrong');

                        }
                    })
                    .catch(function(err) {
                        $('#CourseAddConfirmBtn').html('save')
                        $('#editetModal').modal('hide');
                        toastr.error('someting went wrong');
                    })
            }
        }
        // Course  delete button confirm  click
        $('#course-d-confirm').click(function() {
            $id = $('.course_delete_id').html()
            course_delete($id)
        })

        //   Course delete
        function course_delete(deletId) {
 

            $('#course-d-confirm').html(`<div class="spinner-border spinner-border-sm" role="status"></div>`)

            axios.post('/courseDelete', {
                    id: deletId
                })
                .then(function(response) {
                    $('#course-d-confirm').html('yes')
                    if (response.status == 200) {
                        if (response.data == 1) {
                            $('#coursedeletModal').modal('hide');
                            toastr.success('Course  delete successfully ');
                            getCourseData()

                        } else {
                            $('#coursedeletModal').modal('hide');
                            toastr.error('Course  delete faild');
                            getCourseData()
                        }
                    } else {
                        $('#coursedeletModal').modal('hide');
                        toastr.error('Course  delete fail ');
                    }
                })
                .catch(function(err) {
                    $('#course-d-confirm').html('yes')
                    $('#coursedeletModal').modal('hide');
                    toastr.error('Course  delete fail catch');

                })
        }


        // Course _edit_setals
        function course_edit_details(editId) {
            // $("#service-edit-wrong").not(".d-none").addClass("d-none");
            // ($("#service-edit-loader").hasClass("d-none")) ? $("#service-edit-loader").removeClass("d-none"): '';
            axios.post('/courseDetails', {
                    id: editId
                })
                .then(function(response) {
                    if (response.status == 200) {
                        $('#course-edit-loader').addClass('d-none')
                        $('#course_edidit_data').removeClass('d-none')
                        let jsonData = response.data
                        $('#CourseNameId_edit').val(jsonData[0].course_name)
                        $('#CourseDesId_edit').val(jsonData[0].course_des)
                        $('#CourseFeeId_edit').val(jsonData[0].course_fee)
                        $('#CourseEnrollId_edit').val(jsonData[0].course_totalenroll)
                        $('#CourseClassId_edit').val(jsonData[0].course_totalclass)
                        $('#CourseLinkId_edit').val(jsonData[0].course_link)
                        $('#CourseImgId_edit').val(jsonData[0].course_img)
                    } else {
                        $('#course-edit-loader').addClass('d-none')
                        $('#course-edit-wrong').removeClass('d-none')
                    }
                })
                .catch(function(err) {
                    $('#course-edit-loader').addClass('d-none')
                    $('#course-edit-wrong').removeClass('d-none')
                })
        }

        // course edite  confirm
        $('#CourseEditeConfirmBtn').click(function() {
            let id = $('#editeModalId').html()
            let course_name = $('#CourseNameId_edit').val();
            let course_des = $('#CourseDesId_edit').val();
            let course_fee = $('#CourseFeeId_edit').val();
            let course_totalenroll = $('#CourseEnrollId_edit').val();
            let course_totalclass = $('#CourseClassId_edit').val();
            let course_link = $('#CourseLinkId_edit').val();
            let course_img = $('#CourseImgId_edit').val();

            // console.log(id, course_name, course_des, course_fee, course_totalenroll, course_totalclass,
            //     course_link, course_img);

            services_update(id, course_name, course_des, course_fee, course_totalenroll, course_totalclass,
                course_link, course_img)
        })

        function services_update(id, course_name, course_des, course_fee, course_totalenroll, course_totalclass,
            course_link, course_img) {
            if (course_name.length == 0) {
                toastr.error('course name is empty');
            } else if (course_des.length == 0) {
                toastr.error('course description is empty');
            } else if (course_fee.length == 0) {
                toastr.error('course fee is empty');
            } else if (course_totalenroll.length == 0) {
                toastr.error('course totalenroll is empty');
            } else if (course_totalclass.length == 0) {
                toastr.error('course totalclass is empty');
            } else if (course_link.length == 0) {
                toastr.error('course link is empty');
            } else if (course_img.length == 0) {
                toastr.error('course img is empty');
            } else {
                $('#CourseEditeConfirmBtn').html(`<div class="spinner-border spinner-border-sm" role="status"></div>`)
                axios.post('/courseUpdate', {
                        id: id,
                        course_name: course_name,
                        course_des: course_des,
                        course_fee: course_fee,
                        course_totalenroll: course_totalenroll,
                        course_totalclass: course_totalclass,
                        course_link: course_link,
                        course_img: course_img
                    })
                    .then(function(response) {
                        $('#CourseEditeConfirmBtn').html('save')
                        if (response.status == 200) {
                            if (response.data == 1) {
                                $('#editeModal').modal('hide');
                                toastr.success('update  successfully ');
                                getCourseData()
                            } else {
                                $('#editeModal').modal('hide');
                                toastr.error('update faild ');
                                getCourseData()
                            }
                        } else {
                            $('#service_add_confirm').html('save')
                            $('#editeModal').modal('hide');
                            toastr.error('someting went wrong');

                        }
                    })
                    .catch(function(err) {
                        $('#service_add_confirm').html('save')
                        $('#editeModal').modal('hide');
                        toastr.error('update faild ');
                    })
            }
        }

    </script>
@endsection
