import React, { Dispatch, SetStateAction } from "react";

interface Props {
    setUserQuestion: Function;
    getAnswer: Function;
}

export default function UserInput({ setUserQuestion, getAnswer } : Props) {
    return (   
         <>
            <div className="d-flex justify-content-center">
                <input 
                type="text"
                className="form-control w-25"
                onKeyPress={
                (e) => { 
                    if (e.key === 'Enter') {
                    e.preventDefault();
                    setUserQuestion((e.target as HTMLInputElement).value);
                    getAnswer((e.target as HTMLInputElement).value); 
                    } 
                } 
                }
                />
            </div>
         </>
         );
}