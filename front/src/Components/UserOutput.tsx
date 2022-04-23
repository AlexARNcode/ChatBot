import React from "react";

interface Props {
    userQuestion: string | undefined;
    answer: string | undefined;
}

export default function UserOutput({ userQuestion, answer } : Props) {
    return (   
         <>
              <div className="text-center mt-3">
        {userQuestion && <p>Vous : { userQuestion }</p>}
        {answer && <p>Bot : {JSON.stringify(answer).replace(/["']/g, "")}</p>}
      </div>
         </>
         );
}