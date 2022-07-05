import React from "react";
import Colors from "../values/Colors";

const RadioButton = (props) => {
    return (
        <>
            <input
                id={props.id}
                type="radio"
                name="guest-type"
                value={props.value}
                style={{ width: 28, height: 28 }}
                defaultChecked={props.isDefault}
                {...props}
            />
            <text style={{ marginBottom: 8, marginLeft: 4, fontSize: 16, fontWeight: 'bold' }}>{props.title}</text>
        </>
    )
}

export default RadioButton