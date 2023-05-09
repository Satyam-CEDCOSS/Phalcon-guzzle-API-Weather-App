<?php

use Phalcon\Mvc\Controller;

session_start();

class DisplayController extends Controller
{
    public function currentAction()
    {
        $value = $_SESSION['data'];
        $this->view->current = ' <div class="card" style="color: #4B515D; border-radius: 35px;">
            <div class="card-body p-4">
              <div class="d-flex">
                <h6 class="flex-grow-1 ">' . $value->location->name . ' </h6>
                <h6>' . $value->location->localtime . ' </h6>
              </div>
              <div class="d-flex flex-column text-center mt-5 mb-4">
                <h6 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;">' .
            $value->current->temp_c . ' °C</h6>
                <span class="small" style="color: #868B94">' . $value->current->condition->text . '</span>
              </div>
              <div class="d-flex align-items-center">
                <div class="flex-grow-1" style="font-size: 1rem;">
                  <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1">' .
            $value->current->wind_kph . ' km/h
                    </span></div>
                  <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span class="ms-1">' .
            $value->current->humidity . '%</span>
                  </div>
                  <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span class="ms-1">' .
            $value->current->uv . ' UV</span>
                  </div>
                </div>
                <div>
                  <img src="' . $value->current->condition->icon . '"
                    width="100px">
                </div>
              </div>
            </div>
          </div> ';
    }
    public function forecastAction()
    {
        $value = $_SESSION['data'];
        $this->view->forecast = '<div class="card my-3" style="color: #4B515D; border-radius: 35px;">
        <div class="card-body p-4">
        <div class="d-flex">
          <h6 class="flex-grow-1 ">' . $value->location->name . '</h6>
          <h6>' . $value->location->localtime . '</h6>
        </div>
        <div class="d-flex flex-column text-center mt-5 mb-4">
          <h6 class="display-6 mb-0 font-weight-bold" style="color: #1C2331;">' .
            $value->location->tz_id . '</h6>
        </div>
      </div>
    </div>';
        foreach ($_SESSION['data']->forecast->forecastday as $value) {
            $this->view->forecast .= '<div class="card my-3" style="color: #4B515D; border-radius: 35px;">
            <div class="card-body p-4">
              <div class="d-flex flex-column text-center mt-5 mb-4">
                <h6 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;">' .
                $value->day->avgtemp_c . ' °C</h6>
                <span class="small" style="color: #868B94"> ' . $value->day->condition->text . '</span>
              </div>
              <div class="d-flex align-items-center">
                <div class="flex-grow-1" style="font-size: 1rem;">
                <h6>' . $value->date . '</h6>
                  <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1">Max Temp: ' .
                $value->day->maxtemp_c . ' km/h
                    </span></div>
                  <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span class="ms-1">Min Temp: ' .
                $value->day->mintemp_c . '%</span>
                  </div>
                </div>
                <div>
                  <img src="' . $value->day->condition->icon . '"
                    width="100px">
                </div>
              </div>
            </div>
          </div>';
        }
    }
    public function historyAction()
    {
        $value = $_SESSION['data'];
        $this->view->history = '<div class="card my-3" style="color: #4B515D; border-radius: 35px;">
            <div class="card-body p-4">
              <div class="d-flex">
                <h6 class="flex-grow-1 ">' . $value->location->name . '</h6>
                <h6>' . $value->location->localtime . '</h6>
              </div>
              <div class="d-flex flex-column text-center mt-5 mb-4">
                <h6 class="display-6 mb-0 font-weight-bold" style="color: #1C2331;">' .
            $value->location->tz_id . '</h6>
              </div>
            </div>
          </div>';
        foreach ($_SESSION['data']->forecast->forecastday as $value) {
            $this->view->history .= '<div class="card my-3" style="color: #4B515D; border-radius: 35px;">
            <div class="card-body p-4">
              <div class="d-flex flex-column text-center mt-5 mb-4">
                <h6 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;">' .
                $value->day->avgtemp_c . '°C</h6>
                <span class="small" style="color: #868B94">' . $value->day->condition->text . '</span>
              </div>
              <div class="d-flex align-items-center">
                <div class="flex-grow-1" style="font-size: 1rem;">
                <h6>' . $value->date . '</h6>
                  <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1">Max Temp: ' .
                $value->day->maxtemp_c . ' km/h
                    </span></div>
                  <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span class="ms-1">Min Temp: ' .
                $value->day->mintemp_c . '%</span>
                  </div>
                </div>
                <div>
                  <img src="' . $value->day->condition->icon . '"
                    width="100px">
                </div>
              </div>
            </div>
          </div>';
        }
    }
    public function timezoneAction()
    {
        $value = $_SESSION['data']->location;
        $this->view->timezone = '<div class="card bg-dark text-white" style="border-radius: 40px;">
        <div class="bg-image" style="border-radius: 35px;">
          <img src="https://images.unsplash.com/photo-1584267385494-9fdd9a71ad75?ixlib=rb-4.0.3&ixid=".
          "MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
            class="card-img" alt="weather" width="100%" />
          <div class="mask" style="background-color: rgba(190, 216, 232, .5);"></div>
        </div>
        <div class="card-img-overlay text-dark p-5">
          <h4 class="mb-0">' . $value->name . ", " . $value->region . ", " . $value->country . '</h4>
          <p class="h1 my-3">' . $value->tz_id . '</p>
          <p class="h3 mb-2">Latitude: <strong>' . $value->lat . '</strong></p>
          <p class="h3 mb-2">Longitude: <strong>' . $value->lon . '</strong></p>
          <h4>' . $value->localtime . '</h4>
        </div>
      </div>';
    }
    public function sportsAction()
    {
        foreach ($_SESSION['data'] as $key => $value) {
            $this->view->sport .= '<div class="card m-2" style="color: #4B515D; border-radius: 35px;">
                <div class="card-body p-4">
                  <div class="d-flex">
                    <h5>' . $key . '</h5>
                  </div>
                </div>
              </div>';
        }
    }
    public function astronomyAction()
    {
        $value = $_SESSION['data']->astronomy->astro;
        $this->view->astronomy = '<div class="card bg-dark text-white" style="border-radius: 40px;">
        <div class="bg-image" style="border-radius: 35px;">
          <img src="https://images.unsplash.com/photo-1580193769210-b8d1c049a7d9?ixlib=rb-4.' .
            '0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=874&q=80"
            class="card-img" alt="weather" width="100%" />
          <div class="mask" style="background-color: rgba(190, 216, 232, .5);"></div>
        </div>
        <div class="card-img-overlay text-dark p-5">
        <h2 class="mb-2">' . $_SESSION['data']->location->name . ", " .
            $_SESSION['data']->location->region . ", " . $_SESSION['data']->location->country . '</h2>
          <p class="h4 mb-2">Sun Rise: <strong>' . $value->sunrise . '</strong></p>
          <p class="h4 mb-2">Sun Set: <strong>' . $value->sunset . '</strong></p>
          <p class="h4 mb-2">Moon Rise: <strong>' . $value->moonrise . '</strong></p>
          <p class="h4 mb-2">Moon Set: <strong>' . $value->moonset . '</strong></p>
          <p class="h4 mb-2">Moon Phase: <strong>' . $value->moon_phase . '</strong></p>
        </div>
      </div>';
    }
}
