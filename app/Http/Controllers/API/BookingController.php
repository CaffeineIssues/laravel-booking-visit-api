<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
* @OA\Info(
*     title="Booking API",
*     version="1.0.0",
*     description="API for managing booking resources",
*     @OA\Contact(
*         email="admin@example.com",
*         name="API Support"
*     ),
*     @OA\License(
*         name="Apache 2.0",
*         url="http://www.apache.org/licenses/LICENSE-2.0.html"
*     )
* )
* 
* @OA\Server(
*     url="/api",
*     description="API Server"
* )
* 
* @OA\SecurityScheme(
*     securityScheme="bearerAuth",
*     type="http",
*     scheme="bearer",
*     bearerFormat="JWT"
* )
*/
class BookingController extends Controller
{
    /**
    * Display a listing of bookings.
    * 
    * @OA\Get(
    *     path="/bookings",
    *     operationId="getBookingsList",
    *     tags={"Bookings"},
    *     summary="Get list of bookings",
    *     description="Returns list of bookings",
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *         name="page",
    *         in="query",
    *         description="Page number",
    *         required=false,
    *         @OA\Schema(type="integer", default=1)
    *     ),
    *     @OA\Parameter(
    *         name="per_page",
    *         in="query",
    *         description="Number of items per page",
    *         required=false,
    *         @OA\Schema(type="integer", default=15)
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Successful operation",
    *         @OA\JsonContent(
    *             type="object",
    *             @OA\Property(property="data", type="array", 
    *                 @OA\Items(
    *                     type="object",
    *                     @OA\Property(property="id", type="integer", example=1),
    *                     @OA\Property(property="title", type="string", example="Business Meeting"),
    *                     @OA\Property(property="date", type="string", format="date", example="2023-12-01"),
    *                     @OA\Property(property="start_time", type="string", example="09:00:00"),
    *                     @OA\Property(property="end_time", type="string", example="10:30:00"),
    *                     @OA\Property(property="user_id", type="integer", example=1),
    *                     @OA\Property(property="created_at", type="string", format="date-time"),
    *                     @OA\Property(property="updated_at", type="string", format="date-time")
    *                 )
    *             ),
    *             @OA\Property(property="meta", type="object",
    *                 @OA\Property(property="current_page", type="integer", example=1),
    *                 @OA\Property(property="last_page", type="integer", example=5),
    *                 @OA\Property(property="per_page", type="integer", example=15),
    *                 @OA\Property(property="total", type="integer", example=75)
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Unauthenticated",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="Unauthenticated.")
    *         )
    *     )
    * )
    */
    public function index()
    {
        //
    }

    /**
    * Store a newly created booking.
    * 
    * @OA\Post(
    *     path="/bookings",
    *     operationId="storeBooking",
    *     tags={"Bookings"},
    *     summary="Store new booking",
    *     description="Creates a new booking and returns it",
    *     security={{"bearerAuth":{}}},
    *     @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *             required={"title", "date", "start_time", "end_time"},
    *             @OA\Property(property="title", type="string", example="Business Meeting"),
    *             @OA\Property(property="date", type="string", format="date", example="2023-12-01"),
    *             @OA\Property(property="start_time", type="string", example="09:00:00"),
    *             @OA\Property(property="end_time", type="string", example="10:30:00"),
    *             @OA\Property(property="notes", type="string", example="Discuss project timeline")
    *         )
    *     ),
    *     @OA\Response(
    *         response=201,
    *         description="Booking created successfully",
    *         @OA\JsonContent(
    *             @OA\Property(property="data", type="object",
    *                 @OA\Property(property="id", type="integer", example=1),
    *                 @OA\Property(property="title", type="string", example="Business Meeting"),
    *                 @OA\Property(property="date", type="string", format="date", example="2023-12-01"),
    *                 @OA\Property(property="start_time", type="string", example="09:00:00"),
    *                 @OA\Property(property="end_time", type="string", example="10:30:00"),
    *                 @OA\Property(property="notes", type="string", example="Discuss project timeline"),
    *                 @OA\Property(property="user_id", type="integer", example=1),
    *                 @OA\Property(property="created_at", type="string", format="date-time"),
    *                 @OA\Property(property="updated_at", type="string", format="date-time")
    *             ),
    *             @OA\Property(property="message", type="string", example="Booking created successfully")
    *         )
    *     ),
    *     @OA\Response(
    *         response=422,
    *         description="Validation error",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="The given data was invalid."),
    *             @OA\Property(property="errors", type="object",
    *                 @OA\Property(property="title", type="array", @OA\Items(type="string", example="The title field is required.")),
    *                 @OA\Property(property="date", type="array", @OA\Items(type="string", example="The date field is required."))
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Unauthenticated",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="Unauthenticated.")
    *         )
    *     )
    * )
    */
    public function store(Request $request)
    {
        //
    }

    /**
    * Display the specified booking.
    * 
    * @OA\Get(
    *     path="/bookings/{id}",
    *     operationId="getBookingById",
    *     tags={"Bookings"},
    *     summary="Get booking information",
    *     description="Returns booking data",
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *         name="id",
    *         in="path",
    *         description="Booking ID",
    *         required=true,
    *         @OA\Schema(type="integer")
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Successful operation",
    *         @OA\JsonContent(
    *             @OA\Property(property="data", type="object",
    *                 @OA\Property(property="id", type="integer", example=1),
    *                 @OA\Property(property="title", type="string", example="Business Meeting"),
    *                 @OA\Property(property="date", type="string", format="date", example="2023-12-01"),
    *                 @OA\Property(property="start_time", type="string", example="09:00:00"),
    *                 @OA\Property(property="end_time", type="string", example="10:30:00"),
    *                 @OA\Property(property="notes", type="string", example="Discuss project timeline"),
    *                 @OA\Property(property="user_id", type="integer", example=1),
    *                 @OA\Property(property="created_at", type="string", format="date-time"),
    *                 @OA\Property(property="updated_at", type="string", format="date-time")
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="Booking not found",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="Booking not found")
    *         )
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Unauthenticated",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="Unauthenticated.")
    *         )
    *     )
    * )
    */
    public function show(string $id)
    {
        //
    }

    /**
    * Update the specified booking.
    * 
    * @OA\Put(
    *     path="/bookings/{id}",
    *     operationId="updateBooking",
    *     tags={"Bookings"},
    *     summary="Update existing booking",
    *     description="Updates a booking and returns it",
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *         name="id",
    *         in="path",
    *         description="Booking ID",
    *         required=true,
    *         @OA\Schema(type="integer")
    *     ),
    *     @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *             @OA\Property(property="title", type="string", example="Updated Business Meeting"),
    *             @OA\Property(property="date", type="string", format="date", example="2023-12-01"),
    *             @OA\Property(property="start_time", type="string", example="10:00:00"),
    *             @OA\Property(property="end_time", type="string", example="11:30:00"),
    *             @OA\Property(property="notes", type="string", example="Updated notes for the meeting")
    *         )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Booking updated successfully",
    *         @OA\JsonContent(
    *             @OA\Property(property="data", type="object",
    *                 @OA\Property(property="id", type="integer", example=1),
    *                 @OA\Property(property="title", type="string", example="Updated Business Meeting"),
    *                 @OA\Property(property="date", type="string", format="date", example="2023-12-01"),
    *                 @OA\Property(property="start_time", type="string", example="10:00:00"),
    *                 @OA\Property(property="end_time", type="string", example="11:30:00"),
    *                 @OA\Property(property="notes", type="string", example="Updated notes for the meeting"),
    *                 @OA\Property(property="user_id", type="integer", example=1),
    *                 @OA\Property(property="created_at", type="string", format="date-time"),
    *                 @OA\Property(property="updated_at", type="string", format="date-time")
    *             ),
    *             @OA\Property(property="message", type="string", example="Booking updated successfully")
    *         )
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="Booking not found",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="Booking not found")
    *         )
    *     ),
    *     @OA\Response(
    *         response=422,
    *         description="Validation error",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="The given data was invalid."),
    *             @OA\Property(property="errors", type="object",
    @OA\Property(property="title", type="array", @OA\Items(type="string", example="The title field is required."))
    )
)
),
@OA\Response(
    *         response=401,
    *         description="Unauthenticated",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="Unauthenticated.")
    *         )
    *     )
    * )
    */
public function update(Request $request, string $id)
{
    //
}

/**
    * Remove the specified booking.
    * 
    * @OA\Delete(
    *     path="/bookings/{id}",
    *     operationId="deleteBooking",
    *     tags={"Bookings"},
    *     summary="Delete existing booking",
    *     description="Deletes a booking and returns confirmation message",
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *         name="id",
    *         in="path",
    *         description="Booking ID",
    *         required=true,
    *         @OA\Schema(type="integer")
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Booking deleted successfully",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="Booking deleted successfully")
    *         )
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="Booking not found",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="Booking not found")
    *         )
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Unauthenticated",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="Unauthenticated.")
    *         )
    *     )
    * )
    */
public function destroy(string $id)
{
    //
}
}
