<style>
    .snopes-wrapper {
        padding: 20px;
    }

    .submit-button {
        padding: 10px;
        background-color: black;
        color: white;
        border-radius: 10px;
        margin-top: 10px;
    }

    .radio {
        color: red;
    }

    .question_no {
        color: #e13838;
    }

    .question_desc {
        color:#2e2eb3;
    }
</style>

<div class="snopes-wrapper">
        <form method="GET" action="updateSurveyDetails">
        <div>
            <p><span class="question_no">1.</span> <span class="question_desc">Was the article true or false based on SciPEP’s recommendation?</span></p>
            @if ($surveyDetails == [])
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_1" id="true_1" value="True" required>
                    <label class="form-check-label" for="question_1">True</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_1" id="false_1" value="False">
                    <label class="form-check-label" for="question_1">False</label>
                </div>
                {{-- <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_1" id="nothing_1" value="I dont know">
                    <label class="form-check-label" for="question_1">I don't know</label>
                </div> --}}
                {{-- <input type="radio" id="false_1" name="question_1" value="False">
                <label for="question_1">False</label><br> --}}<br>
                <input type="radio" id="nothing_1" name="question_1" value="I dont know">
                <label for="question_1">I don't know</label> 
            @else
                <p><span style="color:#3b6c03">Ans:</span> {{ $surveyDetails[0]->q1_res }}</p>
            @endif
        </div>
        <br>

        <div>
            <p><span class="question_no">2.</span> <span class="question_desc">Did you have any prior beliefs/opinions about this topic? </span></p>
            @if ($surveyDetails == [])
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_2" id="yes_2" value="yes" required>
                    <label class="form-check-label" for="question_2">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_2" id="No_2" value="yes">
                    <label class="form-check-label" for="question_2">No</label>
                </div>
            @else
                <span><span style="color:#3b6c03">Ans:</span> {{ $surveyDetails[0]->q2_res }}</span>
            @endif
            
        </div>
        <br>

        <div>
            <p><span class="question_no">3.</span> <span class="question_desc">Did your prior beliefs/opinions on this topic align with our recommendation? </span></p>
            @if ($surveyDetails == [])
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_3" id="yes_3" value="yes" required>
                    <label class="form-check-label" for="question_3">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_3" id="No_3" value="No" >
                    <label class="form-check-label" for="question_3">No</label>
                </div><br>
                <input type="radio" id="NA_3" name="question_3" value="NA">
                <label for="question_3">Not Applicable</label><br>
            @else
                <span><span style="color:#3b6c03">Ans:</span> {{ $surveyDetails[0]->q3_res }}</span>
            @endif
        </div>
        <br>
        <div>
            <p>
                <span class="question_no">4.</span>  
                <span class="question_desc">If you held prior beliefs/opinions that did not align with the system’s
                recommendation, did the system change your beliefs/opinions on this topic?
                </span>
            </p>
            @if ($surveyDetails == [])  
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_4" id="yes_4" value="yes" required>
                    <label class="form-check-label" for="question_4">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_4" id="Somewhat_4" value="somewhat" >
                    <label class="form-check-label" for="question_4">Somewhat</label>
                </div><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_4" id="No_4" value="No">
                    <label class="form-check-label" for="question_4">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_4" id="NA_4" value="NA">
                    <label class="form-check-label" for="question_4">Not Applicable</label>
                </div>
            @else
                <span><span style="color:#3b6c03">Ans:</span> {{ $surveyDetails[0]->q4_res }}</span>
            @endif
            
        </div>
        <br>

        <div>
            <p>
                <span class="question_no">5.</span> 
                <span class="question_desc">What is your willingness to adopt the system for checking article credibility?</span>
            </p>
            @if ($surveyDetails == []) 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_5" id="yes_5" value="Definitely" required>
                    <label class="form-check-label" for="question_5">Definitely</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_5" id="prob_5" value="Probably">
                    <label class="form-check-label" for="question_5">Probably</label>
                </div><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_5" id="No_5" value="Probably Not">
                    <label class="form-check-label" for="question_5">Probably Not</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question_5" id="NA_5" value="Definitely Not">
                    <label class="form-check-label" for="question_5">Definitely Not</label>
                </div>
            @else
                <span><span style="color:#3b6c03">Ans:</span> {{ $surveyDetails[0]->q5_res }}</span>
            @endif
    
        
        </div><br>
        @if ($surveyDetails == [])
            <button style="margin-right:10px;color:black; background-color: #f7b338 !important;align-items: center;" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Submit
            </button>
        @endif
            
            {{-- <input class="submit-button" type="submit" value="Submit"> --}}
        </form>
        
        {{-- <button><a href="{{url('article/'.$id.'/SurveyCreate')}}">Submit</a></button> --}}

</div>


  
