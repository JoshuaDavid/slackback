create table if not exists messages (
    id integer primary key,
    token text,
    team_id text,
    team_domain text,
    channel_id text,
    channel_name text,
    timestamp text,
    user_id text,
    user_name text,
    text text,
    trigger_word text
);
