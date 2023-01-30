@extends('layouts.base')

@section('title')
    Projects
@endsection

@section('content')
    <section class="container-fluid" id="hero">
        <div class="row">
            <div class="col-md-12 heading_text ">
                <h1>Projects</h1>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <div class="space-20"></div>
    <section class="container-fluid" id="imageText">
        <div class="row mt-3 flipped">
            <div class="col-md-6 image">
                <img class="shadow"
                    src="https://ares.decipherzone.com/blog-manager/uploads/banner_3ceec8dc-c260-47d9-a8f8-79dd0ee7ea37.jpg"
                    alt="" />
            </div>
            <div class="col-md-6 text">
                <div class="title">
                    <h5>Website Development</h5>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex nulla consequatur officiis sed corrupti
                        temporibus repellendus aliquam quis nostrum totam velit officia praesentium debitis, id possimus
                        tenetur quibusdam. Porro vel sit eaque expedita, magnam cumque quia aspernatur animi, commodi
                        aliquid quibusdam aliquam repellat explicabo, enim sed quaerat possimus! Molestias nisi corrupti
                        neque vero consequuntur quasi suscipit dolore.
                    </p>
                </div>
            </div>
        </div>
        <div class="row my-3 ">
            <div class="col-md-6 image">
                <img class="shadow" src="https://assets.goodfirms.co/images/1557988238-app-image.jpg" alt="" />
            </div>
            <div class="col-md-6 text">
                <div class="title">
                    <h5>Software Application</h5>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex nulla consequatur officiis sed corrupti
                        temporibus repellendus aliquam quis nostrum totam velit officia praesentium debitis, id possimus
                        tenetur quibusdam. Porro vel sit eaque expedita, magnam cumque quia aspernatur animi, commodi
                        aliquid quibusdam aliquam repellat explicabo, enim sed quaerat possimus! Molestias nisi corrupti
                        neque vero consequuntur quasi suscipit dolore.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
